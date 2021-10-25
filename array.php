<?php 

$alimentazioniArr = ['benzina', 'ibrida' , 'benzina_verde' , 'benzina-verde' , 'benzina verde' , 'elettrica' , 'diesel' , 'metano' , 'gpl'];

$marcheArr = ["All" , "all" , "Abarth", "Alfa Romeo","Aston Martin","Audi","Bentley","BMW","Bmw" ,"Bugatti","Cadillac","Chevrolet","Chrysler","Citroën","Dacia","Daewoo","Daihatsu","Dodge","Donkervoort","DS","Ferrari","Fiat","Fisker","Ford","Honda","Hummer","Hyundai","Infiniti","Iveco", "Jaguar","Jeep","Kia","KTM","Lada","Lamborghini","Lancia","Land Rover","Landwind","Lexus","Lotus","Maserati","Maybach","Mazda","McLaren","Mercedes-Benz","MG","Mini","Mitsubishi","Morgan","Nissan","Opel","Peugeot","Porsche","Renault","Rolls-Royce","Rover","Saab","Seat","Skoda","Smart","SsangYong","Subaru","Suzuki","Tesla","Toyota","Volkswagen","Volvo"];


$models = [
    'Abarth' => [
        '595','595C'
    ],
    'Alfa romeo' => [
        '145' , '146' , '147' , '155' , '156' , '159' , '164' , '166' , '1750' , '2000' , '33' , '4C' , '75' , '8C' , '90' , 'Alfa 6' , 'Alfasud' , 'Alfetta' , 'Brera' , 'Crosswagon' , 'Giulia' , 'Giulietta' , 'GT' ,'GTV' ,'Mito' , 'Quadrifoglio' , 'RZ' , 'Spider' , 'Sportwagon' , 'Sprint' , ' Stelvio' , 'SZ' , 'Tonale' 
    ],
    'BMW' => [
        '2002' , 'i3' , 'iX3' , 'M1' , 'serie 1' , 'serie 2' , 'serie 3' , 'serie 4' , 'serie 5' , 'serie 6' , 'serie 7' ,'serie 8' , 'serie M' ,'serie X' , 'serie Z'
    ],
    'Audi' => [
        '100' ,'200' , '50' , '80' , '90' ,'A1' , 'A2' ,'A3' ,'A4' ,'A5' , 'A6' ,'A7' ,'A8', 'Coupe' , 'e-tron' , 'Q1' ,'Q2','Q3','Q4','Q5','Q6','Q7' ,'Q8' ,'QUATTRO' , 'R8','R5', 'RS' ,'S1','S2','S3','S4','S5' ,'S6', 'S7' ,'S8','TT', 'V8'
    ],
    'Chrysler' => [
        '200' , '300M' , '300 SRT' , 'Aspen' ,' Crossfire' ,'Daytona' ,'Es' ,'Grand voyager' , 'GS' , 'Imperial' , 'Neon' , 'Pacifica' , 'Prowler' , 'PT Cruiser' , 'Ram van' ,'Saratoga' , 'Stratus' , 'Valiant' ,'Viper' ,'Vision' , 'Voyager'
    ],
    'Citroen' => [
        '2CV' , 'Acadiane' , 'Ami' , 'Ax' , 'Axel' , 'Berlingo' , 'BX' , 'C-Crosser' , 'C-Elysee' , 'C-Zero' , 'C1' , 'C2', 'C3' , 'C4' , 'C5' , 'C6' ,'C8' , 'CX' , 'DS' , 'Jumper' , 'Jumpy' , 'Nemo' , 'SAXO' , 'Xantia' , 'Xsara' , 'ZX'
    ],
    'Dacia' => [
        '1310' , 'Berlina' , 'Break' ,'Dokker' , 'Duster' , 'Lodgy' , 'Logan' , 'Nova' , 'Pick up' , 'Sandero' , 'Solenza' ,'Spring'
    ],
    'Daewoo' => [
        'Aranos' , 'Damas' , 'Espero' , 'Evanda' , 'Kalos' , 'Korando' , 'Lacetti' , 'Lanos' , 'Leganza' , 'Lublin' , 'Matiz' , 'Musso' , 'Nexia' , 'Nubira' , 'Rexton' , 'Rezzo' , 'Tacuma' , 'Tico' , 'Truck Plus'
    ],
    'Daihatsu' => [
        'Applause' , 'Charade' , 'Charmant' , 'Copen' , 'Cuore' , 'Domino' , 'Extol' , 'F Modelle' , 'Feroza' , 'Freeclimber' , 'Gran Move' , 'Hijet' , 'Materia' , 'Move' , 'Pioner' ,'Rocky' , 'Sirion' , 'Tarf' , 'Terios' ,'Trevis' , 'Valera' , 'YRV'
    ],
    'Fiat' => [
        '124' , '126' , '127' , '128' , '130' , '131' , '132' ,'133' ,'242' ,'500' , '500L' , '500X' , '595' , '600' , 'Brava' , 'Bravo' , 'Campagnola' , 'Coupe' , 'Croma' , 'Doblo' , 'Ducato' , 'Duna' , 'Fiorino' , 'Freemont' , 'Grande punto' , 'Idea' , 'Linea' , 'Marea' , 'Marengo' , 'Maxi' , 'Multipla' , 'Panda' , 'Palio' , 'Penny' , 'Punto' , 'Qubo' , 'Regata' , ' Ritmo' , 'Scudo' , 'Seicento' , 'Stilo' , 'Tempra' , 'Tipo' , 'Ulysse' , 'Uno'
    ],
    'Ford' => [
        'Aerostar' , 'B-Max' , 'Bronco' , 'C-Max' , 'Capri' , 'Connect Elektro' , ' Consul' , 'Cougar' , 'Courier' , 'Crown' , 'Edge' , ' Escape' , 'Escort' , 'Excursion' , 'Expedition' , 'Explorer' , 'Express' , 'Falcon' , 'Fiesta' , 'Flex' , 'Focus' , 'Freestyle' , 'Fusion' , 'Galaxy' , 'GT' , 'Ka' , 'Kuga' , 'Maverick' , 'Mercury' , 'Mondeo' , 'Mustang' , 'Orion' , 'Probe' , 'Puma', 'Ranger' , 'Rs 200' , 'S-Max' , 'Scorpio' , 'Sierra' , 'Sportka' , 'Taurus' , 'Tourneo' , 'Transit'
    ],
    'Honda' => [
        'Accord' , 'Ascot' , 'Avancier' , 'Beat' , 'Capa' , 'City' , 'Civic' , 'Clarity' , 'Concerto' , 'CR-V' , 'CR-Z' , 'CRX' , 'Element' , 'Fit' , 'FR-V' , 'HR-V' , 'Insight' , 'Inspire' , 'Integra' , 'Jazz' , 'Legend' , 'Life' , 'Logo' , 'Mobilio' , 'NSX' , 'Odyssey' , 'Orthia' , 'Prelude' , ' Quintet' , ' S 2000' , 'Saber' ,'Shuttle' , 'Torneo'
    ],
    'Hyundai' => [
        'Accent' , 'Atos' , 'Avante' , 'Azera' , 'Bayon' , 'Coupe' , 'Creta' , 'Elantra' , 'Equus' , 'Excel' , 'Galloper' , 'Genesis' , 'Getz' , 'Grace' , 'Grandeur' , 'H 100' , 'H 300' , 'i10', 'i20' , 'i30' , 'i40' , 'i50' , 'i800','Ioniq' , 'iX20' , 'iX35' , 'iX55' , 'Kona' , 'Lantra' , 'Matrix', 'Nero' , 'Pony' , 'Porter' , 'S-Coupe' , 'Santa Fe' , 'Santamo' , 'Solaris' , 'Sonata' , 'Sonica' ,'Stellar' , 'Terrancan' , 'Tucson' , 'Veracruz' , 'Verna' ,'XG'
    ],
    'Infiniti' => [
        'EX' , 'FX' , 'G25' , 'G35' , 'G37' , 'I35' , 'JX35' , 'M30' , 'M35' , 'M37' , 'M45' , 'Q30' , 'Q45' , 'Q50' , 'Q60' , 'Q70' , 'Q80' , 'QX'
    ],
    'Iveco' => [
        'Daily', 'Massif', 'Campagnola'
    ],
    'Jaguar' => [
        '420' , 'D-Type' , 'Daimler' , 'E-Pace' , 'E-Type' , 'F-Pace' , 'F-Type' , 'I-Pace' , 'MK II' , 'S-Type' , 'Sovereingn' , 'X-Type' , 'X300' , 'XE' , 'XF' , 'XJ' , 'XK'  
    ],
    'Jeep' => [
        'Cherokee' , 'CJ' , 'Comanche' , 'Commander' , 'Compass' , 'Gladiator' , 'Grand Cherokee' , 'Liberty' , 'Patriot' , 'Renegade' , 'Wagoneer' , 'Willys' , 'Wrangler'
    ],
    'Kia' =>[
        'Basta' , 'Crens' , 'Carnival' , 'Ceed' , 'Cerato' , 'Claus' , 'e-Niro' , 'Elan' , 'Joice' , 'K2500' , 'K2700' , 'K2900' , 'Leo' , 'Magentis' , ' Mentor' , 'Mohave' , 'Niro' , 'Opirus' , 'Optima' , 'Picanto' , 'Pregio' , 'Pride' , 'Retona' , 'Rio' , 'Roadster' , 'Rocta' , 'Sephia' ,'Shuma' , 'Sorento' , 'Soul' , 'Spectra' , 'Sportage' , 'Stinger' ,  'Stonic' , 'Venga' , 'Xceed'
    ],
    'Lancia' => [
        'Appia' , 'Beta' , 'Dedra' , 'Delta' , 'Flaminia' , 'Flavia' , 'Gamma' , 'HPE' , 'Kappa' , 'Lybra' ,'MUSA' , 'Phedra' , 'Prisama' , 'Stratos' , 'Thema' , 'Thesis' , 'Trevi' , 'Voyager' , 'Y' , 'Ypsilon' , 'Zeta'
    ],
    'Land Rover' => [
        'Defender' , 'Discovery' , 'Freelander' , 'LRX' , 'Range Rover' , 'Series'
    ],
    'Lexus' => [
        'CT 200' , 'LFA' , ' ES' , 'GS' , 'GX' , 'IS' , 'LC' , 'LS' , 'LX' , 'NX' , 'RC' , 'RX' , 'SC' , 'UX'  
    ],
    'Mazda' => [
        '121' , '2','3','323' , '5' , '6' , '626' , '926' ,'Atenza' , 'Axela' , 'Bongo' , 'BT-50' ,'CX-3' , 'CX-30' , 'CX-5' , 'CX-7' , 'CX-9','Demio' , 'E Series' , 'Familia' , 'Millenia' , 'MPV' ,'M2' , 'MX-3' , 'MX-30' , 'MX-5' , 'MX-6' , 'Pick Up' , 'Premacy' , 'RX-7' ,'RX-8' ,'RX-9','Tribute' , 'Xedos'
    ],
    'Mercedes-Benz' => [
        '170' , '180' , '190','200','208','220' , '230' , '240' ,'250' , '260' , '270','280','300' ,'308', '320' , '350' , '380', '400' , '416' , '420' , '450' , '500' , '560' ,'600' , 'actros' , 'AMG GT' , 'Atego' , 'CE' , 'Citan' , 'CL 160' , 'CL 180' , 'CL 200' , 'CL220' , 'CL 230' , 'CL 320' , ' CL420' , 'CL 500' , 'CL 55' , 'CL 600' , 'CL 63 AMG' , 'CLA' , 'Classe A'  , 'Classe B' , 'Classe C' , 'Classe E' , 'Classe EQ' , 'Classe G' , 'Classe M' ,  'Classe R' , 'Classe S' , 'Classe V' , 'Class X' , 'CLC' , 'CLK' , 'CLS' , 'GL' , 'GLA' , 'GLB' , 'GLC' , 'GLK' , 'GLS' , 'MB 100' , 'SL' , 'SLC' , 'SLK' , 'SLR' , 'SLS' , 'Sprinter' , 'T1' , 'T2' , 'Vaneo' , 'Vario' , 'Viano' ,'Vito'
    ],
    'Mini' => [
        '1000' , '1300' , 'Cooper' , 'Cooper D' , 'Cooper S' , 'Cooper SD' , 'Cooper SE' , 'One' , 'Clubvan' , 'Clubman' , 'Countryman' , 'Coupe' ,'Paceman' , 'Roadster'
    ],
    'Mitsubishi' => [
        '3000 GT' , '400' , 'Airtrek' , 'ASX' , 'Attrage' , 'Canter' , 'Carisma' , 'Chariot' , 'Coklt' , 'Cordia' , 'Cosmos' , 'Delica' , 'Diamante' , 'DINGO' , 'Dion' , 'Eclipse' , 'FTO' , 'Galant' , 'Galloper' , 'Grandis' , 'L200' , 'L300' , 'L400'  , 'Lanceer', 'Legnum' , 'Libero' , 'Mirage' , 'Montero' , 'Outlander' , 'Pajero' , 'RVR' , 'Santamo' , 'Shogun' , 'Sigma' , 'Space gear' , 'Starion', 'Tredia'
    ],
    'Nissan' => [
        '100 NX' , ' 200 SX' , '280 ZX' , '300 ZX', '350Z', '370Z' , 'AD' , 'Almera' , 'Altima', 'Armada' , 'Avenir' , 'Bassara' , 'Bluebird' , 'Cabstart' , 'Cargo' , 'Cedric' , 'Cefiro' , 'Cherry', 'Cube' , 'Datsun' , 'Elgrand', 'Evalia' , 'Expert' , 'Figaro' , 'Frontier' , 'Gloria', 'GT-R' , 'Interstar', 'Juke','Kubistar' ,'Laurel' , 'Leaf', ' Liberty','March', ' Maxima', 'Micra','Murano','Navara', 'Note' , 'NP300' , 'NV200' , 'NV250','NV300','Pathfinder' , 'Patrol' , 'Pick up' , 'Pixo' , 'Prairie' , 'Presage', 'Primastar','Primera','Pulsar', 'Qashquai' , 'Quest', 'Rogue', 'Safari' , 'Sentra' , 'Serena', 'Silvia','Skyline', 'Stagea' , 'Stanza', 'Sunny', 'Teana' ,'Terrano','Tilda','Titan', 'Trade' , 'Urvan','Vanette','Wingroad', 'X-trail'
    ],
    'Opel' => [
        'Adam' , 'Agila', 'Ampera', 'Antara' ,'Arena', 'Ascona' , 'Asta' , 'Calibra' , 'Campo' , 'Cascada' , 'Combo' , 'Commodore', 'Corsa', 'Crossland', 'Diplomat','Frontera' , 'Granland', 'GT', 'Insignia' , 'Kadett', 'Karl','Manta','Meriva' ,'Mokka','Monterey' , 'Monza', 'Movano' , 'Omega','Record' , 'Senator' , 'Signum', ' Sintra' ,' Speedster' , ' Tigra' , 'Vectra' , ' Vivaro' , 'Zafira'
    ],
    'Peugeot' => [
        '1007' , '104' , '106' , '107', '108', '2008', '204','205','206', '207','208', '3008' , '301', '304', '305','306','307' , '308' , '309' , '4007' , '4008','404','405','406','407' , '5008' , '504', '505' , '508','604','605','607','806','807','Bipper', 'Boxer' , 'Expert','iOn','J5','J9','Partner' , 'Ranch','RCZ','Rifter','Traveller'
    ],
    'Renault' => [
        'Alpine' , 'Arkana','Avantime', 'Captur','Clio','Coupe','Duster', 'Espace','Express','Fluence','Fuego','Kadjar','Kangoo','Laguna','Latitude','Logan','Mascott','Master','Megane','Messanger','Modus','Rapid','Safrane','Sandero','Scenic','Symbol','Talisman','Trafic','Twingo','Twizy','Vel Satis','Wind','Zoe'
    ],
    'Rover' => [
        '100' , '114', '115','200','213','214','216','218','220','25','400','414','416','418','420','45','600','618','620','623','75','800','820','825','827','Estate','Metro','MINI','Moontego','Rover','Sd','Tourer'
    ],
    'Saab' => [
        '9-2X' , '9-3','9-4X','9-5','9-7X','90', '900','9000','92','93','96','99','GT 750','Sonett','GT850'
    ],
    'Seat' => [
        'Alhambra','Altea','Arona','Arosa','Ateca','Cordoba','Exeo','Fura','Ibiza','Inca','Leon','Malaga','Marbella','Mii','Panda','Ronda','Tarraco','Terra','Toledo'
    ],
    'Skoda' => [
        '105','120','130','135','Citigo','Enyaq','Fabia','favorit','Felicia','Forman','Kamiq','Karoq','Kodiaq','Octavia','Pratik','Rapid','Roomster','Scala','Snowman','Superb','Yeti'
    ],
    'Smart' => [
        'Brabus','Crossblade','forFoour','forTwo','Roadster'
    ],
    'SsangYong' => [
        'Actyon','Family','Kallista','Korando','Kyron','MUSSO','Rexton','Rodius','tivoli','XLV'
    ],
    'Subaru' => [
        '1200','1800' , 'Ascent','Baja' , 'BRZ','Crosstrek','E10','E12','Forester','Impreza','Justy','Legacy','Leone','Levorg','Libero','M60','M70','M80','Outback','SVX','Trezia' ,'Vanille','Vivio','WRX','XT'
    ],
    'Suzuki' => [
        'Across','Alto','Baleno','Cappucino','Carry' , 'Calerio','Escudo','Ignis','Jimny' , 'Kizashi','Liana','Maruti','Samurai','Splash','Swace','Swift','Vitara','Wagon','X-90'
    ],
    'Toyota' => [
        '4-Runner' , 'Allion','Alphard', 'Altezza','Aristo','Auris','Avalon','Avensis' ,'Aygo' , 'Belta' , 'C-HR','Caldina' , 'Cami' ,'Camry', 'Carina' , 'Celica','Chaser' , 'Coaster','Corolla','Corona','Corsa','Cresta','Cressida','Crown','Duet','Dyna','Estima' , 'FJ Cruiser' , 'Fortuner' , 'Funcargo','Gaia' , 'Harrier', 'HDJ' , 'Hiace' , 'Highlander' ,'Hilux' , 'Ipsum','iQ','ist','KJ','Land cruiser' , 'Lite-Ace' , 'Mark II' , 'Matrix','MR 2','Nadia','Noah','Opa','Paseo','Passo','Pick up','Picnic', 'Platz','Premio','Previa','Prius','Proace','Ractis','Raum','RAV 4','Sequoia','Sienna','Solara','Sprinter' , 'Starlet','Supra','Tacoma','Tercel','Tundra','Venza' , 'Verossa' , 'Verso','Vista','Vitz','Voxy','Windom','Wish','Yaris'
    ],
    'Volkswagen' => [
        '181','Amarok','Anfibio','Arteon','Atlas','Beetle','Bora','Buggy','Bus','Caddy' , 'Corrado','Crafter','Derby','e-up!','Eos','Escarabajo','Fox','Golf','Gran California' , 'ID.3' , 'ID.4' , 'Iltis','Jetta','Kafer','Kever','L80','LT','Lupo','Passat','Phaeton','Pointer','Polo','Routan','Santana','Scirocco' , 'Sharan','T-Cross','T-Roc','T1','T2','T3','T4','T5','T6','Taro','Touareg','Touran','Transporter' , 'Up!' , 'Vento','XL1'
    ],
    'Volvo' => [
        '240','244','245','262','264','265','340','360','440','460','480','740','744','745','760','764','780','850','855','940','944','945','960','965','Amazon','C30','C70','P1800','Polar','PV544' , 'S40','S60','S70','S80','S90','V40','V50','V60','V70' , 'V90','XC40','XC60','XC70','XC90'
    ]
];


// return json_encode($models[$_GET['brand']]);