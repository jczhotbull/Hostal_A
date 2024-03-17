<?php


        





$query_String_nacionalitys = "SELECT COUNT(*) AS total_nacionalitys FROM nationality";

$query_nacionalitys = mysqli_query($enlace, $query_String_nacionalitys);

$row_nacionalitys = mysqli_fetch_object($query_nacionalitys);




	    $query_String_sexos = "SELECT COUNT(*) AS total_sexos FROM sex";

        $query_sexos = mysqli_query($enlace, $query_String_sexos);

        $row_sexos = mysqli_fetch_object($query_sexos);




$query_String_paises = "SELECT COUNT(*) AS total_paises FROM country";

$query_paises = mysqli_query($enlace, $query_String_paises);

$row_paises = mysqli_fetch_object($query_paises);




        $query_String_rols = "SELECT COUNT(*) AS total_rols FROM roles";

        $query_rols = mysqli_query($enlace, $query_String_rols);

        $row_rols = mysqli_fetch_object($query_rols);



        $query_String_room_kind = "SELECT COUNT(*) AS total_room_kind FROM room_kind";

        $query_room_kind = mysqli_query($enlace, $query_String_room_kind);
        
        $row_room_kind = mysqli_fetch_object($query_room_kind);



        $query_String_floors = "SELECT COUNT(*) AS total_floors FROM floors";

        $query_floors = mysqli_query($enlace, $query_String_floors);
        
        $row_floors = mysqli_fetch_object($query_floors);




        $query_String_room_number = "SELECT COUNT(*) AS total_room_number FROM room_number";

        $query_room_number = mysqli_query($enlace, $query_String_room_number);
        
        $row_room_number = mysqli_fetch_object($query_room_number);



        $query_String_hostel_area = "SELECT COUNT(*) AS total_hostel_area FROM hostel_area";

        $query_hostel_area = mysqli_query($enlace, $query_String_hostel_area);
        
        $row_hostel_area = mysqli_fetch_object($query_hostel_area);



        $query_String_bed_number = "SELECT COUNT(*) AS total_bed_number FROM bed_number";

        $query_bed_number = mysqli_query($enlace, $query_String_bed_number);
        
        $row_bed_number = mysqli_fetch_object($query_bed_number);




        $query_String_bed_kind = "SELECT COUNT(*) AS total_bed_kind FROM bed_kind";

        $query_bed_kind = mysqli_query($enlace, $query_String_bed_kind);
        
        $row_bed_kind = mysqli_fetch_object($query_bed_kind);




        $query_String_taxes = "SELECT COUNT(*) AS total_taxes FROM taxes";

        $query_taxes = mysqli_query($enlace, $query_String_taxes);
        
        $row_taxes = mysqli_fetch_object($query_taxes);




        $query_String_discounts = "SELECT COUNT(*) AS total_discounts FROM discounts";

        $query_discounts = mysqli_query($enlace, $query_String_discounts);
        
        $row_discounts = mysqli_fetch_object($query_discounts);
        



        $query_String_currency = "SELECT COUNT(*) AS total_currency FROM currency";

        $query_currency = mysqli_query($enlace, $query_String_currency);
        
        $row_currency = mysqli_fetch_object($query_currency);




        $query_String_products = "SELECT COUNT(*) AS total_products FROM productos";

        $query_products = mysqli_query($enlace, $query_String_products);
        
        $row_products = mysqli_fetch_object($query_products);





        $query_String_products_k = "SELECT COUNT(*) AS total_products_k FROM product_kind";

        $query_products_k = mysqli_query($enlace, $query_String_products_k);
        
        $row_products_k = mysqli_fetch_object($query_products_k);


        

       
        $query_String_behaviors = "SELECT COUNT(*) AS total_behaviors FROM behaviors";

        $query_behaviors = mysqli_query($enlace, $query_String_behaviors);
        
        $row_behaviors = mysqli_fetch_object($query_behaviors);


        $query_String_room_s = "SELECT COUNT(*) AS total_room_s FROM room_status";

        $query_room_s = mysqli_query($enlace, $query_String_room_s);
        
        $row_room_s = mysqli_fetch_object($query_room_s);


        $query_String_bed_s = "SELECT COUNT(*) AS total_bed_s FROM bed_status";

        $query_bed_s = mysqli_query($enlace, $query_String_bed_s);
        
        $row_bed_s = mysqli_fetch_object($query_bed_s);



        $query_String_incident_r = "SELECT COUNT(*) AS total_incident_r_status FROM incident_r_status";

        $query_incident_r = mysqli_query($enlace, $query_String_incident_r);
        
        $row_incident_r = mysqli_fetch_object($query_incident_r);



        $query_String_incident_b = "SELECT COUNT(*) AS total_incident_b_status FROM incident_b_status";

        $query_incident_b = mysqli_query($enlace, $query_String_incident_b);
        
        $row_incident_b = mysqli_fetch_object($query_incident_b);


        $query_String_incident_b = "SELECT COUNT(*) AS total_incident_b_status FROM incident_b_status";

        $query_incident_b = mysqli_query($enlace, $query_String_incident_b);
        
        $row_incident_b = mysqli_fetch_object($query_incident_b);


        $query_String_incidents_rooms = "SELECT COUNT(*) AS total_incidents_rooms FROM incidents_rooms";

        $query_incidents_rooms = mysqli_query($enlace, $query_String_incidents_rooms);
        
        $row_incidents_rooms = mysqli_fetch_object($query_incidents_rooms);


        $query_String_incidents_beds = "SELECT COUNT(*) AS total_incidents_beds FROM incidents_beds";

        $query_incidents_beds = mysqli_query($enlace, $query_String_incidents_beds);
        
        $row_incidents_beds = mysqli_fetch_object($query_incidents_beds);


        




?>
