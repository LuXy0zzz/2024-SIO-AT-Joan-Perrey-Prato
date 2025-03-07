using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Net.Http;
using Newtonsoft.Json.Linq;
using MySql.Data.MySqlClient;

namespace TP_1_dotNet_app_v2
{
    public partial class MainWindow : Window
    {
        private const string ApiToken = "f6527381c2558549616654eccf686fdd5aee2662a965bd16ee16113c0cac5758";
        private const string ConnectionString = "Server=localhost;Database=202502_sio2a_atpro_meteoapp;User ID=root;Password=;SslMode=none;";

        public MainWindow()
        {
            InitializeComponent();
        }

        private async void Rechercher_Click(object sender, RoutedEventArgs e)
        {
            string cityName = VilleBox.Text;
            if (string.IsNullOrEmpty(cityName))
            {
                MessageBox.Show("Veuillez entrer le nom d'une ville.");
                return;
            }

            try
            {
                // Supprimer les données périmées avant de vérifier la base de données
                DeleteOutdatedWeatherData();

                // Vérifiez d'abord dans la base de données
                var dbData = GetWeatherDataFromDB(cityName);
                if (dbData.HasValue)
                {
                    DisplayWeatherData(dbData.Value);
                    return;
                }

                // Si non trouvé dans la base de données, appelez l'API
                string inseeCode = await GetInseeCode(cityName);
                string postalCode = await GetCodePostal(cityName);
                if (string.IsNullOrEmpty(inseeCode))
                {
                    MessageBox.Show("Ville introuvable. Veuillez vérifier le nom.");
                    return;
                }

                var weatherData = await GetWeatherData(inseeCode);
                var weatherDataWithCity = (cityName, postalCode, weatherData);

                // Afficher les données
                DisplayWeatherData(weatherDataWithCity);

                // Stocker les données dans la base de données
                StoreWeatherDataInDB(weatherDataWithCity);
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Erreur : {ex.Message}");
            }
        }



        private void DisplayWeatherData((string cityName, string postalCode, (Tuple<string, string, string>, Tuple<string, string, string>, Tuple<string, string, string>) weatherData) data)
        {
            labelVille.Text = $"Ville : {data.cityName}";
            labelDepartement.Text = $"Code Postal : {data.postalCode}";
            dateDuJour.Text = $"Date : {DateTime.Now:dd/MM/yyyy}";

            // Aujourd'hui
            tempMinJour0.Text = $"Min : {data.weatherData.Item1.Item1}°C";
            tempMaxJour0.Text = $"Max : {data.weatherData.Item1.Item2}°C";
            imageJour0.Source = GetWeatherImage(int.Parse(data.weatherData.Item1.Item3)); // Image du jour

            // Demain
            tempMinJour1.Text = $"Min : {data.weatherData.Item2.Item1}°C";
            tempMaxJour1.Text = $"Max : {data.weatherData.Item2.Item2}°C";
            imageJour1.Source = GetWeatherImage(int.Parse(data.weatherData.Item2.Item3)); // Image de demain

            // Après-demain
            DateTime dateApresDemain = DateTime.Now.AddDays(2);
            Date_apres_demain.Text = $"{dateApresDemain:dd/MM/yyyy}";

            tempMinJour2.Text = $"Min : {data.weatherData.Item3.Item1}°C";
            tempMaxJour2.Text = $"Max : {data.weatherData.Item3.Item2}°C";
            imageJour2.Source = GetWeatherImage(int.Parse(data.weatherData.Item3.Item3)); // Image après-demain
        }

        private (string cityName, string postalCode, (Tuple<string, string, string>, Tuple<string, string, string>, Tuple<string, string, string>) weatherData)? GetWeatherDataFromDB(string cityName)
        {
            using (MySqlConnection conn = new MySqlConnection(ConnectionString))
            {
                conn.Open();
                string query = "SELECT * FROM meteo WHERE ville = @cityName AND date_recherche >= DATE_SUB(NOW(), INTERVAL 1 DAY)";
                using (MySqlCommand cmd = new MySqlCommand(query, conn))
                {
                    cmd.Parameters.AddWithValue("@cityName", cityName);
                    using (MySqlDataReader reader = cmd.ExecuteReader())
                    {
                        if (reader.Read())
                        {
                            var weatherData = (
                                Tuple.Create(reader["temp_min_jour0"].ToString(), reader["temp_max_jour0"].ToString(), reader["weather_code_jour0"].ToString()),
                                Tuple.Create(reader["temp_min_jour1"].ToString(), reader["temp_max_jour1"].ToString(), reader["weather_code_jour1"].ToString()),
                                Tuple.Create(reader["temp_min_jour2"].ToString(), reader["temp_max_jour2"].ToString(), reader["weather_code_jour2"].ToString())
                            );
                            return (cityName, reader["postal_code"].ToString(), weatherData);
                        }
                    }
                }
            }
            return null;
        }

        private void DeleteOutdatedWeatherData()
        {
            using (MySqlConnection conn = new MySqlConnection(ConnectionString))
            {
                conn.Open();
                string query = "DELETE FROM meteo WHERE date_recherche < DATE_SUB(NOW(), INTERVAL 1 DAY)";
                using (MySqlCommand cmd = new MySqlCommand(query, conn))
                {
                    cmd.ExecuteNonQuery();
                }
            }
        }


        private void StoreWeatherDataInDB((string cityName, string postalCode, (Tuple<string, string, string>, Tuple<string, string, string>, Tuple<string, string, string>) weatherData) data)
        {
            using (MySqlConnection conn = new MySqlConnection(ConnectionString))
            {
                conn.Open();
                string query = @"INSERT INTO meteo (ville, insee, postal_code, date_jour0, temp_min_jour0, temp_max_jour0, weather_code_jour0,
                                                     date_jour1, temp_min_jour1, temp_max_jour1, weather_code_jour1,
                                                     date_jour2, temp_min_jour2, temp_max_jour2, weather_code_jour2)
                                 VALUES (@cityName, @insee, @postalCode, @dateJour0, @tempMinJour0, @tempMaxJour0, @weatherCodeJour0,
                                         @dateJour1, @tempMinJour1, @tempMaxJour1, @weatherCodeJour1,
                                         @dateJour2, @tempMinJour2, @tempMaxJour2, @weatherCodeJour2)";
                using (MySqlCommand cmd = new MySqlCommand(query, conn))
                {
                    cmd.Parameters.AddWithValue("@cityName", data.cityName);
                    cmd.Parameters.AddWithValue("@insee", "insee_value"); // Remplacez par la valeur INSEE réelle
                    cmd.Parameters.AddWithValue("@postalCode", data.postalCode);
                    cmd.Parameters.AddWithValue("@dateJour0", DateTime.Now);
                    cmd.Parameters.AddWithValue("@tempMinJour0", data.weatherData.Item1.Item1);
                    cmd.Parameters.AddWithValue("@tempMaxJour0", data.weatherData.Item1.Item2);
                    cmd.Parameters.AddWithValue("@weatherCodeJour0", data.weatherData.Item1.Item3);
                    cmd.Parameters.AddWithValue("@dateJour1", DateTime.Now.AddDays(1));
                    cmd.Parameters.AddWithValue("@tempMinJour1", data.weatherData.Item2.Item1);
                    cmd.Parameters.AddWithValue("@tempMaxJour1", data.weatherData.Item2.Item2);
                    cmd.Parameters.AddWithValue("@weatherCodeJour1", data.weatherData.Item2.Item3);
                    cmd.Parameters.AddWithValue("@dateJour2", DateTime.Now.AddDays(2));
                    cmd.Parameters.AddWithValue("@tempMinJour2", data.weatherData.Item3.Item1);
                    cmd.Parameters.AddWithValue("@tempMaxJour2", data.weatherData.Item3.Item2);
                    cmd.Parameters.AddWithValue("@weatherCodeJour2", data.weatherData.Item3.Item3);
                    cmd.ExecuteNonQuery();
                }
            }
        }

        private async Task<string> GetInseeCode(string cityName)
        {
            using (HttpClient client = new HttpClient())
            {
                string url = "https://api.meteo-concept.com/api/location/cities?token=" + ApiToken + "&search=" + cityName;
                var response = await client.GetAsync(url);

                if (response.IsSuccessStatusCode)
                {
                    var content = await response.Content.ReadAsStringAsync();
                    var json = JObject.Parse(content);
                    var cities = json["cities"];
                    if (cities != null && cities.HasValues)
                    {
                        return cities[0]["insee"]?.ToString();
                    }
                }
            }
            return null;
        }

        private async Task<string> GetCodePostal(string cityName)
        {
            using (HttpClient client = new HttpClient())
            {
                string url = "https://api.meteo-concept.com/api/location/cities?token=" + ApiToken + "&search=" + cityName;
                var response = await client.GetAsync(url);

                if (response.IsSuccessStatusCode)
                {
                    var content = await response.Content.ReadAsStringAsync();
                    var json = JObject.Parse(content);
                    var cities = json["cities"];
                    if (cities != null && cities.HasValues)
                    {
                        return cities[0]["cp"]?.ToString();
                    }
                }
            }
            return null;
        }

        private async Task<(Tuple<string, string, string>, Tuple<string, string, string>, Tuple<string, string, string>)> GetWeatherData(string inseeCode)
        {
            using (HttpClient client = new HttpClient())
            {
                string url = $"https://api.meteo-concept.com/api/forecast/daily?token={ApiToken}&insee={inseeCode}";
                var response = await client.GetAsync(url);

                if (response.IsSuccessStatusCode)
                {
                    var content = await response.Content.ReadAsStringAsync();
                    var json = JObject.Parse(content);
                    var forecast = json["forecast"];

                    if (forecast != null && forecast.HasValues)
                    {
                        // Récupérer les températures et codes weather pour aujourd'hui, demain, et après-demain
                        string tminToday = forecast[0]["tmin"]?.ToString();
                        string tmaxToday = forecast[0]["tmax"]?.ToString();
                        string weatherCodeToday = forecast[0]["weather"]?.ToString();

                        string tminTomorrow = forecast[1]["tmin"]?.ToString();
                        string tmaxTomorrow = forecast[1]["tmax"]?.ToString();
                        string weatherCodeTomorrow = forecast[1]["weather"]?.ToString();

                        string tminDayAfter = forecast[2]["tmin"]?.ToString();
                        string tmaxDayAfter = forecast[2]["tmax"]?.ToString();
                        string weatherCodeDayAfter = forecast[2]["weather"]?.ToString();

                        return (
                            Tuple.Create(tminToday, tmaxToday, weatherCodeToday),
                            Tuple.Create(tminTomorrow, tmaxTomorrow, weatherCodeTomorrow),
                            Tuple.Create(tminDayAfter, tmaxDayAfter, weatherCodeDayAfter)
                        );
                    }
                }
            }
            return (null, null, null);
        }

        private BitmapImage GetWeatherImage(int weatherCode)
        {
            string imageUrl = string.Empty;

            if (weatherCode >= 0 && weatherCode <= 7)
            {
                imageUrl = "https://cdn-icons-png.flaticon.com/512/8996/8996145.png"; // Image pour soleil nuageux
            }
            else if (weatherCode >= 10 && weatherCode <= 78)
            {
                imageUrl = "https://cdn-icons-png.flaticon.com/512/5132/5132546.png"; // Image pour pluie
            }
            else if (weatherCode >= 100 && weatherCode <= 142)
            {
                imageUrl = "https://cdn-icons-png.flaticon.com/512/798/798355.png"; // Image pour orage
            }
            else if (weatherCode >= 210 && weatherCode <= 235)
            {
                imageUrl = "https://us.123rf.com/450wm/kroljaaa/kroljaaa1702/kroljaaa170200094/72686678-soleil-nuage-ligne-simple-de-pluie-symboles-m%C3%A9t%C3%A9o-m%C3%A9t%C3%A9orologie-%C3%A9l%C3%A9ment-de-conception-de.jpg"; // Image pour météos plus faibles
            }

            return new BitmapImage(new Uri(imageUrl));
        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            // boutton
        }
    }
}
