<?php

$firstname = array(
    'admin',
    'Johnathon',
    'Anthony',
    'Erasmo',
    'Raleigh',
    'Nancie',
    'Tama',
    'Camellia',
    'Augustine',
    'Christeen',
    'Luz',
    'Diego',
    'Lyndia',
    'Thomas',
    'Georgianna',
    'Leigha',
    'Alejandro',
    'Marquis',
    'Joan',
    'Stephania',
    'Elroy',
    'Zonia',
    'Buffy',
    'Sharie',
    'Blythe',
    'Gaylene',
    'Elida',
    'Randy',
    'Margarete',
    'Margarett',
    'Dion',
    'Tomi',
    'Arden',
    'Clora',
    'Laine',
    'Becki',
    'Margherita',
    'Bong',
    'Jeanice',
    'Qiana',
    'Lawanda',
    'Rebecka',
    'Maribel',
    'Tami',
    'Yuri',
    'Michele',
    'Rubi',
    'Larisa',
    'Lloyd',
    'Tyisha',
    'Samatha',
    'Mischke',
    'Serna',
    'Pingree',
    'Mcnaught',
    'Pepper',
    'Schildgen',
    'Mongold',
    'Wrona',
    'Geddes',
    'Lanz',
    'Fetzer',
    'Schroeder',
    'Block',
    'Mayoral',
    'Fleishman',
    'Roberie',
    'Latson',
    'Lupo',
    'Motsinger',
    'Drews',
    'Coby',
    'Redner',
    'Culton',
    'Howe',
    'Stoval',
    'Michaud',
    'Mote',
    'Menjivar',
    'Wiers',
    'Paris',
    'Grisby',
    'Noren',
    'Damron',
    'Kazmierczak',
    'Haslett',
    'Guillemette',
    'Buresh',
    'Center',
    'Kucera',
    'Catt',
    'Badon',
    'Grumbles',
    'Antes',
    'Byron',
    'Volkman',
    'Klemp',
    'Pekar',
    'Pecora',
    'Schewe',
    'Ramage',
);

$lastname = array(
    '',
    'Thomas',
'Julietta',
'Larry',
'Tana',
'Keena',
'Sharice',
'Jeannetta',
'Vesta',
'Sheryl',
'Tameka',
'Sandra',
'Treena',
'Brynn',
'Leilani',
'Coral',
'Sherise',
'Michelle',
'Karon',
'Thomasina',
'Taneka',
'Olga',
'Blondell',
'Orville',
'Weldon',
'Hope',
'Santina',
'Cythia',
'Lula',
'Margy',
'Dominica',
'Renato',
'Jeanine',
'Crystle',
'Heide',
'Wai',
'Lola',
'Garland',
'Gabriele',
'Nohemi',
'Hilaria',
'Alison',
'Jen',
'Naida',
'Vanna',
'Yolande',
'Kaycee',
'Leland',
'Josef',
'Cher',
'Merilyn',
'Thomas',
'Julietta',
'Larry',
'Tana',
'Keena',
'Sharice',
'Jeannetta',
'Vesta',
'Sheryl',
'Tameka',
'Sandra',
'Treena',
'Brynn',
'Leilani',
'Coral',
'Sherise',
'Michelle',
'Karon',
'Thomasina',
'Taneka',
'Olga',
'Blondell',
'Orville',
'Weldon',
'Hope',
'Santina',
'Cythia',
'Lula',
'Margy',
'Dominica',
'Renato',
'Jeanine',
'Crystle',
'Heide',
'Wai',
'Lola',
'Garland',
'Gabriele',
'Nohemi',
'Hilaria',
'Alison',
'Jen',
'Naida',
'Vanna',
'Yolande',
'Kaycee',
'Leland',
'Josef',
'Cher',
'Merilyn',
);


include("dbconfig/dbconfig.php");
if($dbConnected){
    $sqlselect = "SELECT * FROM users";
    $result=mysqli_query($dbConnected, $sqlselect); 
}
$i = 0;
while($row=mysqli_fetch_assoc($result)){
    if($dbConnected){
        $sqlselect = "UPDATE users
        SET email = '".$firstname[$i]."@maiwp.gov.my',
        username = '".$firstname[$i]."',
        fullname = '".strtoupper($lastname[$i])." ".strtoupper($firstname[$i])."'
        WHERE id = '".$row['id']."'";
        $result2=mysqli_query($dbConnected, $sqlselect); 
        $i++;
    }
}



?>

