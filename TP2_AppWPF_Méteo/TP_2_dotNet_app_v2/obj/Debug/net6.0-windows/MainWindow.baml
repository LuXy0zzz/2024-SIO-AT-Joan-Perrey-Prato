   M S B A M L   `   `   `  ����M  ITP_1_dotNet_app_v2, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null7 clr-namespace:TP_1_dotNet_app_v2TP_1_dotNet_app_v2  5   	   #    TP_1_dotNet_app_v2.MainWindow   5   	   W SPresentationCore, Version=6.0.2.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=6.0.2.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=6.0.2.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=6.0.2.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5   	   R NSystem.Xaml, Version=6.0.2.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   2local clr-namespace:TP_1_dotNet_app_v2     5   	     � Title$  
MainWindow��5   	   $	��450��6   $	��800��6)   .��5	      � .+�5
   
   �� $
��Left=�6   $	��414��6/   $��10,0,0,0q�6<   
���   �$��Center=�6]   $	��166��6x   ���	#FF98A7FF6�   �� 5   
   $
��Left=�6   $	��162��6/   $��
181,10,0,0q�6<   
���   �$	��Top=�6_   $	��609��6w   ��5      �� 5       �� ImageSource$� �https://www.francebleu.fr/s3/cruiser-production/2020/01/5c989b06-6490-4af3-9856-a37cec976cd7/1200x680_gettyimages-1185823582.jpg��6   5      �� 5   
   $
��Left=�6   $	��247��6/   $��181,177,0,0q�6<   
���   �$	��Top=�6`   $	��609��6x   �� 5   
   -   5         ��Name$ bouttonRechercher��5      $��
Rechercher��6,   $
��Left=�6A   $��35��6\   $��
23,155,0,0q�6h   $	��Top=�6|   $	��140��6�   6�   �� 5   
   -   5        $��Button��5      $
��Left=�6"   $��35��6=   $��
23,251,0,0q�6I   $	��Top=�6]   $	��140��6u   6�   �� 5   
   $
��Left=�6   $��35��6/   $��	23,69,0,0q�6;   $	��Top=�6N   $	��140��6f   $
��Wrap=�6r    �� TextAlignment$ Center=�6�   $��Entrez une ville :��6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   �� 5   
   -   5         ��Name$ VilleBox��5      $
��Left=�6$   $��23��6?   $��
22,109,0,0q�6K    �� TextWrapping$
 Wrap=�6_   $	��Top=�6s   $	��140��6�   A� 5   
   $
��Left=�6   $��30��6-   $��	18,17,0,0q�69   $	��Top=�6L   $��30��6d    J� RenderTransformOrigin$ -4.22,-2.559&�6o   ��5      �� 5      $; 5https://cdn-icons-png.flaticon.com/512/552/552448.png��6   z�5      V� 5      .~�5      �� �� 5      �� 5       �� Angle$ -0.007Q�6&   T� 5      5      5!      �� 5"   
   $
��Left=�6   $��32��6/   $��	22,17,0,0q�6;   $	��Top=�6N   $	��138��6f   $
��Wrap=�6r   $ Center=�6�   $��Jokerman)�6�   $��22(�6�   $
��Bold"�6�   �� 6�    � Language$ fr-fr�6�   $�Météo��6�   6�   �� 5#   
   
���   �$��1q�6%   $
��Left=�69   $��1��6T   $��
23,213,0,0q�6_   $	��Top=�6s   $	��137��6�   �� 5$   
   $
��Left=�6   $	��155��6-   $��191,258,0,0q�6:   $	��Top=�6O   $	��141��6g   �� 5%   
   $
��Left=�6   $��27��6/   $��207,226,0,0q�6;   $	��Top=�6P   $��96��6h   $
��Wrap=�6s   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   $ 0.227,0.582&�6�   �� 6   $ fr-fr�6  $
�News��6  6$  �� 5&   
   -   5        	 ��Name$	 
labelVille��5&      $
��Left=�6(   $��55��6C   $��
207,31,0,0q�6O   $	��Top=�6c   $	��168��6{   $
��Wrap=�6�   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   �� 5'   
   -   5        $	 
dateDuJour��5'      $
��Left=�6(   $��36��6C   $��549,120,0,0q�6O   $	��Top=�6d   $	��225��6|   $
��Wrap=�6�   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   �� 5(   
   $��Button��6   $
��Left=�6"   $��871,240,0,0q�6=   $	��Top=�6R   $��0��6j   �� 5)   
   -   5        $	 labelDepartement��5)      $
��Left=�6.   $��23��6I   $��
207,97,0,0q�6U   $	��Top=�6i   $	��168��6�   $
��Wrap=�6�   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   �� 5*   
   $
��Left=�6   $	��225��6/   $��348,188,0,0q�6<   
���   �$	��Top=�6`   $	��426��6x   ��5+      �� 5,      5.      �� 5/   
   -   5        $	 tempMinJour0��5/      $
��Left=�6*   $��39��6E   $��355,247,0,0q�6Q   $
��Wrap=�6f   $	��Top=�6z   $��64��6�   �� 50   
   -   5        $	 tempMaxJour0��50      $
��Left=�6*   $��38��6E   $��424,248,0,0q�6Q   $
��Wrap=�6f   $	��Top=�6z   $��62��6�   �� 51   
   -	   5        $	 Aujourd_hui��51      $
��Left=�6)   $��28��6D   $��355,198,0,0q�6P   $	��Top=�6e   $	��138��6}   $
��Wrap=�6�   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   $ 0.157,0.608&�6�   �� 6  $ fr-fr�6  $�Aujourd'hui��6+  6A  �� 52   
   -
   5        $	 Demain��52      $
��Left=�6$   $��28��6?   $��515,198,0,0q�6K   $	��Top=�6`   $��92��6x   $
��Wrap=�6�   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   �� 6�   $ fr-fr�6�   $�Demain��6  6  �� 53   
   -   5        $	 Date_apres_demain��53      $
��Left=�6/   $��28��6J   $��647,198,0,0q�6V   $	��Top=�6k   $	��118��6�   $
��Wrap=�6�   $ Center=�6�   $��Segoe UI Symbol)�6�   $��18(�6�   $
��Bold"�6�   $�� ��6�   �� 54   
   -   5        $	 tempMinJour1��54      $
��Left=�6*   $��39��6E   $��504,247,0,0q�6Q   $
��Wrap=�6f   $	��Top=�6z   $��66��6�   �� 55   
   -   5        $	 tempMaxJour1��55      $
��Left=�6*   $��39��6E   $��575,247,0,0q�6Q   $
��Wrap=�6f   $	��Top=�6z   $��61��6�   �� 56   
   -   5        $	 tempMinJour2��56      $
��Left=�6*   $��38��6E   $��647,248,0,0q�6Q   $
��Wrap=�6f   $	��Top=�6z   $��59��6�   �� 57   
   -   5        $	 tempMaxJour2��57      $
��Left=�6*   $��40��6E   $��711,246,0,0q�6Q   $
��Wrap=�6f   $	��Top=�6z   $��63��6�   �� 58   
   $
��Left=�6   $	��225��6/   $��498,188,0,0q�6<   
���   �$	��Top=�6`   $��1��6x   $ 0.5,0.5&�6�   z�59      V� 5:      .~�5;      �� 
 �� ScaleX$
 -1Q�6%   �� 5<      �� 5=      T� 5>      5?      5A      �� 5B   
   $
��Left=�6   $	��225��6/   $��641,188,0,0q�6<   
���   �$	��Top=�6`   $��1��6x   $ 0.5,0.5&�6�   z�5C      V� 5D      .~�5E      �� $
 -1Q�6%   �� 5F      �� 5G      T� 5H      5I      5K      �� 5L   
   -   5         ��Name$ 
imageJour0��5L      $
��Left=�6$   $	��100��6?   $��375,300,0,0q�6L   $	��Top=�6a   $	��100��6y   �� 5M   
   -   5        $ 
imageJour1��5M      $
��Left=�6$   $	��100��6?   $��515,300,0,0q�6L   $	��Top=�6a   $	��100��6y   �� 5N   
   -   5        $ 
imageJour2��5N      $
��Left=�6$   $	��100��6?   $��662,300,0,0q�6L   $	��Top=�6a   $	��100��6y   5P      5Q      