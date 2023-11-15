<?php
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/data/reservation-'.$_POST['datetimeslot'].'.json', '{ "'.$_POST['user'].'": "data" }');