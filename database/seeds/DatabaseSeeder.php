<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Hexagram;
use App\DailyHex;
use App\Trigram;
use App\User;
use App\Role;
use App\Nature;
use App\Element;
use App\People;
use App\BodyPart;
use App\Animal;
use App\Sickness;
use App\Color;
use App\Deity;
use App\Attribute;
use App\Nobleman;
use App\Opening;
use App\Weather;
use App\Luck;
use App\Wealth;
use App\Relationship;
use App\Business;
use App\Family;
use App\Legal;
use App\Examination;
use App\Travel;
use App\Health;
use App\Property;
use App\SystemContent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserFactory::class);
        $this->createHex();
        $this->createDailyHex();
        $this->createUser();
        $this->createRole();
        $this->createUserRole();
        $this->createTrigram();
        $this->createNature();
        $this->createElement();
        $this->createPeople();
        $this->createBodyPart();
        $this->createAnimal();
        $this->createSickness();
        $this->createColor();
        $this->createDeity();
        $this->createAttribute();
        $this->createNobleman();
        $this->createOpening();
        $this->createWeather();
        $this->createLuck();
        $this->createWealth();
        $this->createRelationship();
        $this->createBusiness();
        $this->createFamily();
        $this->createLegal();
        $this->createexamination();
        $this->createTravel();
        $this->createHealth();
        $this->createProperty();
        $this->createSystemContent();
        
    }

    public function createHex(){
        Hexagram::insert([
            [
                'name' => 'Heaven',
                'code' => '111111',
                
            ],
            [
                'name' => 'Earth',
                'code' => '000000',
            ],
            [
                'name' => 'Beginning',
                'code' => '010001',
            ],
            [
                'name' => 'Bliss',
                'code' => '100010',
            ],
            [
                'name' => 'Waiting',
                'code' => '010111',
            ],
            [
                'name' => 'Litigation',
                'code' => '111010',
            ],
            [
                'name' => 'Officer',
                'code' => '000010',
            ],
            [
                'name' => 'Alliance',
                'code' => '010000',
            ],
            [
                'name' => 'Small Livestock',
                'code' => '110111',
            ],
            [
                'name' => 'Tread',
                'code' => '111011',
            ],
            [
                'name' => 'Unity',
                'code' => '000111',
            ],
            [
                'name' => 'Stagnation',
                'code' => '111000',
            ],
            [
                'name' => 'Fellowship',
                'code' => '111101',
            ],
            [
                'name' => 'Great Reward',
                'code' => '101111',
            ],
            [
                'name' => 'Humility',
                'code' => '000100',
            ],
            [
                'name' => 'Delight',
                'code' => '001000',
            ],
            [
                'name' => 'Following',
                'code' => '011001',
            ],
            [
                'name' => 'Poison',
                'code' => '100110',
            ],
            [
                'name' => 'Arriving',
                'code' => '000011',
            ],
            [
                'name' => 'Observation',
                'code' => '110000',
            ],
            [
                'name' => 'Biting',
                'code' => '101001',
            ],
            [
                'name' => 'Beauty',
                'code' => '100101',
            ],
            [
                'name' => 'Peel',
                'code' => '100000',
            ],
            [
                'name' => 'Returning',
                'code' => '000001',
            ],
            [
                'name' => 'Without Wrongdoing',
                'code' => '111001',
            ],
            [
                'name' => 'Big Livestock',
                'code' => '100111',
            ],
            [
                'name' => 'Nourish',
                'code' => '100001',
            ],
            [
                'name' => 'Great Exceeding',
                'code' => '011110',
            ],
            [
                'name' => 'Water',
                'code' => '010010',
            ],
            [
                'name' => 'Fire',
                'code' => '101101',
            ],
            [
                'name' => 'Influence',
                'code' => '011100',
            ],
            [
                'name' => 'Consistency',
                'code' => '001110',
            ],
            [
                'name' => 'Retreat',
                'code' => '111100',
            ],
            [
                'name' => 'Great Strength',
                'code' => '001111',
            ],
            [
                'name' => 'Advancement',
                'code' => '101000',
            ],
            [
                'name' => 'Dimming Light',
                'code' => '000101',
            ],
            [
                'name' => 'Family',
                'code' => '110101',
            ],
            [
                'name' => 'Opposition',
                'code' => '101011',
            ],
            [
                'name' => 'Obstruction',
                'code' => '010100',
            ],
            [
                'name' => 'Relief',
                'code' => '001010',
            ],
            [
                'name' => 'Decreasing',
                'code' => '100011',
            ],
            [
                'name' => 'Increasing',
                'code' => '110001',
            ],
            [
                'name' => 'Eliminating',
                'code' => '011111',
            ],
            [
                'name' => 'Meeting',
                'code' => '111110',
            ],
            [
                'name' => 'Gathering',
                'code' => '011000',
            ],
            [
                'name' => 'Rising',
                'code' => '000110',
            ],
            [
                'name' => 'Trap',
                'code' => '011010',
            ],

            [
                'name' => 'Well',
                'code' => '010110',
            ],
            [
                'name' => 'Reform',
                'code' => '011101',
            ],
            [
                'name' => 'Cauldron',
                'code' => '101110',
            ],
            [
                'name' => 'Thunder',
                'code' => '011001',
            ],
            [
                'name' => 'Mountain',
                'code' => '100100',
            ],
            [
                'name' => 'Gradual Progress',
                'code' => '110100',
            ],
            [
                'name' => 'Marrying Maiden',
                'code' => '001011',
            ],
            [
                'name' => 'Abundance',
                'code' => '001101',
            ],
            [
                'name' => 'Travelling',
                'code' => '101100',
            ],
            [
                'name' => 'Wind',
                'code' => '110110',
            ],
            [
                'name' => 'Marsh',
                'code' => '011011',
            ],

            [
                'name' => 'Dispersing',
                'code' => '110010',
            ],
            [
                'name' => 'Regulate',
                'code' => '010011',
            ],
            [
                'name' => 'Sincerity',
                'code' => '110011',
            ],
            [
                'name' => 'Lesser Exceeding',
                'code' => '001100',
            ],
            [
                'name' => 'Accomplished',
                'code' => '010101',
            ],
            [
                'name' => 'Not Yet Accomplished',
                'code' => '101010',
            ],

            
        ]);
    }

    public function createDailyHex(){
        for($i = 1;$i<=31;$i++){
            DailyHex::insert([
                [
                    'hexagram_id' => 0
                ]
            ]);
        }
    }

    public function createUser(){
        User::insert([
            [
                'firstname' => "Khenneth",
                'lastname' => "Alaiza",
               
                'email' => "khenneth.alaiza@gmail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'api_token' => Str::random(60),
                'is_subscriber' => 1,
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => "Maricel",
                'lastname' => "Alaiza",
              
                'email' => "angon_maricel@yahoo.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'api_token' => Str::random(60),
                'is_subscriber' => 1,
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => "Michael",
                'lastname' => "Tupas",
              
                'email' => "michael.tupas@gmail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'api_token' => Str::random(60),
                'is_subscriber' => 1,
                'remember_token' => Str::random(10),
            ],

        ]);
    }

    public function createRole(){
        Role::insert([
            [
                'name' => "Administrator"
            ],
            [
                'name' => 'Consultant'
            ],
            [
                'name' => 'User'
            ]
        ]);
    }

    public function createUserRole(){
        $sampleUserRole = array(
            [
                'role_id' => 1,
                'user_id' => 1
            ],
            [
                'role_id' => 2,
                'user_id' => 2
            ],
            [
                'role_id' => 3,
                'user_id' => 3
            ],
            
        );
        \DB::table('role_user')->insert($sampleUserRole);
    }

    public function createTrigram(){
        Trigram::insert([
            [
                'name' => 'Kan Gua (North)',
                'code' => '010',
            ],
            [
                'name' => 'Kun Gua (Southwest)',
                'code' => '000',
            ],
            [
                'name' => 'Zhen Gua (East)',
                'code' => '001',
            ],
            [
                'name' => 'Xun Gua (SouthEast)',
                'code' => '110',
            ],
            [
                'name' => 'Qian Gua (Northwest)',
                'code' => '111',
            ],
            [
                'name' => 'Dui Gua (West)',
                'code' => '011',
            ],
            [
                'name' => 'Gen Gua (Northeast)',
                'code' => '100',
            ],
            [
                'name' => 'Li Gua (South)',
                'code' => '101',
            ],
        ]);
    }

    public function createNature(){
        Nature::insert([
            [
                'name' => 'Civilized'
            ],
            [
                'name' => 'Clingy'
            ],
            [
                'name' => 'Beauty'
            ],
            [
                'name' => 'Love'
            ],
            [
                'name' => 'Beautiful'
            ],
            [
                'name' => 'Handsome'
            ],
            [
                'name' => 'Worrisome'
            ],
            [
                'name' => 'Danger'
            ],
            [
                'name' => 'Hardship'
            ],
            [
                'name' => 'Soft'
            ],
            [
                'name' => 'Obidient'
            ],
            [
                'name' => 'Wide'
            ],
            [
                'name' => 'Thick'
            ],
            [
                'name' => 'Quiet'
            ],
            [
                'name' => 'Active'
            ],
            [
                'name' => 'Quick to make Decision'
            ],
            [
                'name' => 'Shocking or Surprising'
            ],
            [
                'name' => 'In and Out'
            ],
            [
                'name' => 'Hesitant'
            ],
            [
                'name' => 'Indecisive'
            ],
            [
                'name' => 'unable to make decision quick'
            ],
            [
                'name' => 'Energetic'
            ],
            [
                'name' => 'Dominant'
            ],
            [
                'name' => 'Vast'
            ],
            [
                'name' => 'Argumentative'
            ],
            [
                'name' => 'Entertaining'
            ],
            [
                'name' => 'With Good Sense of Humor'
            ],
            [
                'name' => 'Spoiled'
            ],
            [
                'name' => 'Happy or Joy'
            ],
            [
                'name' => 'Lofty'
            ],
            [
                'name' => 'Solid'
            ],
            [
                'name' => 'Upright'
            ],
            [
                'name' => 'Stubborn'
            ],
            [
                'name' => 'Stop'
            ],
            [
                'name' => 'Straight'
            ],
            [
                'name' => 'Observant'
            ],
        ]);
    }

    public function createElement(){
        Element::insert([
            [
                'name' => 'Fire'
            ],
            [
                'name' => 'Earth'
            ],
            [
                'name' => 'Metal'
            ],
            [
                'name' => 'Wood'
            ],
            [
                'name' => 'Water'
            ],
        ]);
    }

    public function createPeople(){
        People::insert([
            [
                'name' => 'Middle Son'
            ],
            [
                'name' => 'Fisherman'
            ],
            [
                'name' => 'Pirate'
            ],
            [
                'name' => 'Sailor'
            ],
            [
                'name' => 'Mother'
            ],
            [
                'name' => 'Step Mother'
            ],
            [
                'name' => 'Farmer'
            ],
            [
                'name' => 'Villager'
            ],
            [
                'name' => 'Old Lady'
            ],
            [
                'name' => 'Big Bellied'
            ],
            [
                'name' => 'Crowd'
            ],
            [
                'name' => 'Eldest Son'
            ],
            [
                'name' => 'Eldest Daughter'
            ],
            [
                'name' => 'Widow'
            ],
            [
                'name' => 'Monk'
            ],
            [
                'name' => 'Emperor'
            ],
            [
                'name' => 'President'
            ],
            [
                'name' => 'Prime Minister'
            ],
            [
                'name' => 'Father'
            ],
            [
                'name' => 'Adult'
            ],
            [
                'name' => 'Old People'
            ],
            [
                'name' => 'Senior Citizen'
            ],
            [
                'name' => 'Famous Person'
            ],
            [
                'name' => "Emperor's Servant"
            ],
            [
                'name' => "Politician's Servant"
            ],
            [
                'name' => 'Politician'
            ],
            [
                'name' => 'Civil Servants'
            ],
            [
                'name' => 'Government Officials'
            ],
            [
                'name' => 'Boss'
            ],
            [
                'name' => 'Leader'
            ],
            [
                'name' => 'Chairman'
            ],
            [
                'name' => 'CEO'
            ],
            [
                'name' => 'Top Leader'
            ],
            [
                'name' => 'Youngest Daughter'
            ],
            [
                'name' => 'Mistress'
            ],
            [
                'name' => 'Singer'
            ],
            [
                'name' => 'Actor'
            ],
            [
                'name' => 'Translator'
            ],
            [
                'name' => 'Wizard'
            ],
            [
                'name' => 'Slave'
            ],
            [
                'name' => 'Maid/Helper'
            ],
            [
                'name' => 'Servant'
            ],
            [
                'name' => 'Youngest Son'
            ],
            [
                'name' => 'Young Kids'
            ],
            [
                'name' => 'People living in the jungle'
            ],
            [
                'name' => 'Hermit'
            ],
            [
                'name' => 'Person Lots of free time'
            ],
            [
                'name' => 'Tambay'
            ],
            [
                'name' => 'Middle Daughter'
            ],
            [
                'name' => 'Writer'
            ],
            [
                'name' => 'Portly People'
            ],
            [
                'name' => 'Army'
            ],

            [
                'name' => 'Person with eye desease'
            ],
            [
                'name' => 'Police'
            ],
        ]);
    }

    public function createBodyPart(){
        BodyPart::insert([
            [
                'name' => "Ear"
            ],
            [
                'name' => "Blood"
            ],
            [
                'name' => "Kidney"
            ],
            [
                'name' => "Eyes"
            ],
            [
                'name' => "Heart"
            ],
            [
                'name' => "Part from Tongue to Stomach"
            ],
            [
                'name' => "Finger"
            ],
            [
                'name' => "Bone"
            ],
            [
                'name' => "Nose"
            ],
            [
                'name' => "Back"
            ],
            [
                'name' => "Backbone"
            ],
            [
                'name' => "Tongue"
            ],
            [
                'name' => "Mouth"
            ],
            [
                'name' => "Throat"
            ],
            [
                'name' => "Lung"
            ],
            [
                'name' => "Phlegm or Sputum"
            ],
            [
                'name' => "Saliva"
            ],
            [
                'name' => "Head"
            ],
            [
                'name' => "Upper Arms"
            ],
            [
                'name' => "Thighs"
            ],
            [
                'name' => "Foot"
            ],
            [
                'name' => "Liver"
            ],
            [
                'name' => "Hair"
            ],
            [
                'name' => "Vocal Cords"
            ],
            [
                'name' => "Abdomen"
            ],
            [
                'name' => "Spleen"
            ],
            [
                'name' => "Flesh"
            ],
            [
                'name' => "Womb"
            ]
        ]);
    }

    public function createAnimal(){
        Animal::insert([
            [
                'name' => "Pig"
            ],
            [
                'name' => "Fish"
            ],
            [
                'name' => "Aquatic Animal"
            ],
            [
                'name' => "Cow"
            ],
            [
                'name' => "All Animal"
            ],
            [
                'name' => "Male Horse"
            ],
            [
                'name' => "Dragon"
            ],
            [
                'name' => "Snake"
            ],
            [
                'name' => "Insect"
            ],
            [
                'name' => "Chicken"
            ],
            [
                'name' => "Insects in the jungle"
            ],
            [
                'name' => "Horse"
            ],
            [
                'name' => "Swan"
            ],
            [
                'name' => "Lion"
            ],
            [
                'name' => "Elephant"
            ],
            [
                'name' => "Or other Large Animals"
            ],
            [
                'name' => "Aligators"
            ],
            [
                'name' => "Turtles"
            ],
            [
                'name' => "Other animals that lives in swamp"
            ],
            [
                'name' => "Tiger"
            ],
            [
                'name' => "Dog"
            ],
            [
                'name' => "Rat"
            ],
            [
                'name' => "Rodents"
            ],
            [
                'name' => "Wild Chicken"
            ],
            [
                'name' => "Tortoise"
            ],
            [
                'name' => "Shelled Animals"
            ],
            [
                'name' => "Crabs"
            ],
        ]);
    }

    public function createSickness(){
        Sickness::insert([
            [
                'name' => "Ear Disease"
            ],
            [
                'name' => "Heart Disease"
            ],
            [
                'name' => "Infection"
            ],
            [
                'name' => "Kidney Problem"
            ],
            [
                'name' => "Stomach Problem"
            ],
            [
                'name' => "Diarrhea/LBM"
            ],
            [
                'name' => "Deafness"
            ],
            [
                'name' => "Abdominal Disease"
            ],
            [
                'name' => "Stomach Disease"
            ],
            [
                'name' => "Poor Apetite"
            ],
            [
                'name' => "Indigestion"
            ],
            [
                'name' => "Foot Disease"
            ],
            [
                'name' => "Liver Disease"
            ],
            [
                'name' => "Excessive Worry or Anxiety"
            ],
            [
                'name' => "State of Shock or Surprise"
            ],
            [
                'name' => "Thigh Problems"
            ],
            [
                'name' => "Excessive Flatulence or disease related to gas/wind"
            ],
            [
                'name' => "Intestinal Disease"
            ],
            [
                'name' => "Stroke"
            ],
            [
                'name' => "Weak qi"
            ],
            [
                'name' => "Head/Brain related"
            ],
            [
                'name' => "Lung Disease"
            ],
            [
                'name' => "Covid 19"
            ],
            [
                'name' => "Muscle and Bone"
            ],
            [
                'name' => "Disease of Tongue to Stomach"
            ],
            [
                'name' => "Worry if Divination occurs during summer"
            ],
            [
                'name' => "Mouth or Tongue"
            ],
            [
                'name' => "Throat Disease"
            ],
            [
                'name' => "Sore Throat"
            ],
            [
                'name' => "Respiratory Disease"
            ],
            [
                'name' => "Lack of Apetite"
            ],
            [
                'name' => "Disease Related to Finger"
            ],
            [
                'name' => "Disease Related to Toes"
            ],
            [
                'name' => "Disease Related to Stomach"
            ],
            [
                'name' => "Eyes Disease"
            ],
            [
                'name' => "Infectious Disease"
            ],
            [
                'name' => "Divination during summer indicates heartstroke"
            ],
            
        ]);
    }

    public function createColor(){
        Color::insert([
            [
                'name' => "red"
            ],
            [
                'name' => "Black"
            ],
            [
                'name' => "Blue"
            ],
            [
                'name' => "Yellow"
            ],
            [
                'name' => "Dark Green"
            ],
            [
                'name' => "Jade Green"
            ],
            [
                'name' => "Green"
            ],
            [
                'name' => "White Gold"
            ],
            [
                'name' => "Silver"
            ],
        ]);
    }   

    public function createDeity(){
        Deity::insert([
            [
                'name' => "Phoenix"
            ],
            [
                'name' => "Tortoise"
            ],
            [
                'name' => "Moon"
            ],
            [
                'name' => "Harmony"
            ],
            [
                'name' => "Earth"
            ],
            [
                'name' => "Snake"
            ],
            [
                'name' => "Tiger"
            ],
            [
                'name' => "Hook"
            ],
        ]);
    }

    public function createAttribute(){
        Attribute::insert([
            [
                'attribute' => 'Business Opening',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Nobleman',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Weather',
                'is_hex' => 1
            ],
            [
                'attribute' => 'General Luck',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Wealth',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Relationship',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Business',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Family',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Legal Matters',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Examination',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Travel',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Health',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Lost Property',
                'is_hex' => 1
            ],
            [
                'attribute' => 'Nature',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Element',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Number',
                'is_hex' => 0
            ],
            [
                'attribute' => 'People',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Body Part',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Animal',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Sickness',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Color',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Shape',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Deity',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Door',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Star',
                'is_hex' => 0
            ],
            [
                'attribute' => 'Direction',
                'is_hex' => 0
            ],
        ]);
    }

    public function createNobleman(){
        for($i=1;$i<=64;$i++){
            Nobleman::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
        
    }

    public function createOpening(){
        for($i=1;$i<=64;$i++){
            Opening::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createWeather(){
        for($i=1;$i<=64;$i++){
            Weather::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createLuck(){
        for($i=1;$i<=64;$i++){
            Luck::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createWealth(){
        for($i=1;$i<=64;$i++){
            Wealth::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createRelationship(){
        for($i=1;$i<=64;$i++){
            Relationship::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createBusiness(){
        for($i=1;$i<=64;$i++){
            Business::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createFamily(){
        for($i=1;$i<=64;$i++){
            Family::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createLegal(){
        for($i=1;$i<=64;$i++){
            Legal::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createexamination(){
        for($i=1;$i<=64;$i++){
            Examination::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createTravel(){
        for($i=1;$i<=64;$i++){
            Travel::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createHealth(){
        for($i=1;$i<=64;$i++){
            Health::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createProperty(){
        for($i=1;$i<=64;$i++){
            Property::insert([
                [
                    'hexagram_id' => $i,
                    'description' => '',
                    'rating' => 0
                ]
            ]);
        }
    }

    public function createSystemContent(){
        SystemContent::insert([
            [
                'content_name' => 'About Us',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ea reiciendis quis nostrum magni omnis ab quidem odit quae. Velit perspiciatis eius suscipit aut quae laborum facilis porro iure eveniet!'
            ],
            [
                'content_name' => 'footer',
                'content' => '©copyright@ jennelcheng.com'
            ]
        ]);
    }
}
