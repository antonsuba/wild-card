<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Preference;
use App\Suggestion;
use App\Preference_Suggestion;
use App\AvailPref;
use App\Location;
use App\Place;
use App\Activity;

class Seeder extends Controller
{
    public function seedAll(){
        $this->populateCategories();
        $this->populatePreferences();
        $this->populateLocations();
        $this->populateSuggestions();
        $this->populatePrefSuggestions();
        $this->populateAvailPrefs(); 
        $this->populatePlaces(); 
        $this->populateActivities(); 
        $this->populateActivityPlace();
    }

    public function populateCategories(){
        $categories = array(
            ['name' => 'Night Life'],
            ['name' => 'Arts and Culture'],
            ['name' => 'Outdoors'],
            ['name' => 'Food'],
            ['name' => 'Sports']
        );
        foreach($categories as $category){
            $check = Category::where('name', '=', $category['name'])->first();
            if($check === null){
                $model = new Category;
                $model->name = $category['name'];
                $model->save();
            }
        }
        echo 'Category population successful';
    }
    public function populatePreferences(){
        $preferences = array(
            ['name' => 'Clubs', 'category_id' => '1'],
            ['name' => 'Drinking', 'category_id' => '1'],
            ['name' => 'Bar Hopping', 'category_id' => '1'],
            ['name' => 'Educational', 'category_id' => '2'],
            ['name' => 'Museums', 'category_id' => '2'],
            ['name' => 'Concerts', 'category_id' => '2'],
            ['name' => 'Rock Climbing', 'category_id' => '3'],
            ['name' => 'Hiking', 'category_id' => '3'],
            ['name' => 'Beaches', 'category_id' => '3'],
            ['name' => 'Solo Dining', 'category_id' => '4'],
            ['name' => 'Casual Dining', 'category_id' => '4'],
            ['name' => 'Fine Dining', 'category_id' => '4'],
            ['name' => 'Basketball', 'category_id' => '5'],
            ['name' => 'Swimming', 'category_id' => '5'],
            ['name' => 'Football', 'category_id' => '5']
        );
	    
        foreach($preferences as $preference){
            $check = Preference::where('name', '=', $preference['name'])->first();

            if($check === null){
                $model = new Preference;
                $model->name = $preference['name'];
                $model->category_id = $preference['category_id'];

                $model->save();
            }
        }

        echo 'Preference population successful';
    }

    public function populateLocations(){
        $locations = array(
            ['name' => 'Manila']
        );

        foreach($locations as $location){
            $model = new Location;
            $model->name = $location['name'];

            $model->save();
        }

        echo 'Locations population successfull';
    }

    public function populateSuggestions(){
        /*$suggestions = array(
            ['name' => 'Sip ang Gogh', 'rating' => 5, 'location' => 'Eastwood', 'popularity' => 22, 'weight' => 0.7, 'img_src' => 
				'http://assets.rappler.com/612F469A6EA84F6BAE882D2B94A4B421/img/43A97D6F7D034142902D48E7C6272C87/kids-and-kids-at-heart-would-enjoy-the-painting-activity-rappler-20140615.jpg'],
            ['name' => 'The Bunk', 'rating' => 3, 'location' => 'Shaw Blvd', 'popularity' => 43, 'weight' => 0.33, 'img_src' =>
				'http://rochelleabella.com/wp-content/uploads/2016/01/IMG_9107.jpg'],
            ['name' => 'Prohibition', 'rating' => 4, 'location'=> 'Greenbelt 5, Makati', 'popularity' => 72, 'weight' => 0.2, 'img_src' =>
				'http://ph.openrice.com/userphoto/photo/0/IK/003NYH4556A6416DC655E2l.jpg'],
            ['name' => 'Gatorade - Chelsea FC Blue Pitch', 'rating' => 4, 'location' => 'Circuit Makati, Makati', 'popularity' => 55, 'weight' => 0.25,
                    'img_src' => 'http://sa.kapamilya.com/absnews/abscbnnews/media/abs-cbnnews/a_images/graphics/2014/jan15_blue.jpg'],
            ['name' => 'Ninyo Fusion Cuisine', 'rating' => 5, 'location' => '66 Esteban Abada St, Loyola Heights, Quezon City', 'popularity' => 34, 'weight' => 0.51,
                    'img_src' => 'http://2.bp.blogspot.com/_NnPCnoTDhhY/S2deOh2SGiI/AAAAAAAAB5s/OwiSDAv4J50/s640/IMG_8657.jpg'],
            ['name' => 'Philippine Center for Creative Imaging', 'rating' => 5, 'location' => '2247 Chino Roces Ave, Makati', 'popularity' => 47, 'weight' => 0.40,
                    'img_src' => 'http://1.bp.blogspot.com/-rgTkab_fvjI/Ue6RFdnFWUI/AAAAAAAAkFM/s4nLqDCyLp8/s640/pcci_slide_02.jpg'],
            ['name' => 'El Chupacabra', 'rating' => 4, 'location' => '5782 Felipe, Makati', 'popularity' => 60, 'weight' => 0.64, 'img_src' =>
                    'http://www.juice.ph/cms_images/243261/IMG_1133.jpg'],
            ['name' => 'Gandiva Archery Range and Cafe', 'rating' => 4, 'location' => 'Meralco Ave, Pasig', 'popularity' => 80, 'weight' => 0.17, 'img_src' =>
                    'http://gandiva.com.ph/wp-content/uploads/2016/06/range.jpg'],
            ['name' => 'Carpaccio Ristorante Italiano', 'rating' => 4, 'location' => 'San Antonio Village, Makati', 'popularity' => 28, 'weight' => 0.43, 'img_src' =>
                    'https://3.bp.blogspot.com/-ZTTl3nrHXFA/V1dVKKpFlAI/AAAAAAAARro/FR_oDRgY3qsODh2wWhaFIGne7w2n8CNpACLcB/s1600/int1.jpg']
        );*/

        $suggestions = array(
            ['name' => 'Rooftop Bar Hopping', 'rating' => 5, 'location_id' => 1, 'description' => 'Good Memories and Bad Decisions', 'popularity' => 72, 'weight'=> 0.2,
                'img_src' => 'http://rochelleabella.com/wp-content/uploads/2016/01/IMG_9107.jpg']
        );

        foreach($suggestions as $suggestion){
            $check = Suggestion::where('name', '=', $suggestion['name'])->first();

            if($check === null){
                $model = new Suggestion;
                $model->name = $suggestion['name'];
                $model->rating = $suggestion['rating'];
                $model->location_id = $suggestion['location_id'];
                $model->description = $suggestion['description'];
                $model->popularity = $suggestion['popularity'];
                $model->weight = $suggestion['weight'];
                $model->img_src = $suggestion['img_src'];

                $model->save();
            }
        }

        echo 'Suggestion population successful';
    }

    public function populatePrefSuggestions(){
        $prefSuggestions = array(
            /*['preference_id' => 8, 'suggestion_id' => 1],
            ['preference_id' => 4, 'suggestion_id' => 2],
            ['preference_id' => 5, 'suggestion_id' => 3],
            ['preference_id' => 6, 'suggestion_id' => 4],
            ['preference_id' => 1, 'suggestion_id' => 5],
            ['preference_id' => 9, 'suggestion_id' => 6],
            ['preference_id' => 3, 'suggestion_id' => 7],
            ['preference_id' => 7, 'suggestion_id' => 8],
            ['preference_id' => 2, 'suggestion_id' => 9]*/
            ['preference_id' => 1, 'suggestion_id' => 1]
        );

        foreach($prefSuggestions as $prefSuggestion){
            $model = new Preference_Suggestion;
            $model->preference_id = $prefSuggestion['preference_id'];
            $model->suggestion_id = $prefSuggestion['suggestion_id'];

            $model->save();
        }

        echo 'PrefSuggestions population successful';
    }

    public function populateAvailPrefs(){
        $availprefs = array(
            ['user_id' => 1, 'preference_id' => 1, 'recency_score' => 10]
            /*['user_id' => 1, 'preference_id' => 2, 'recency_score' => 2],
            ['user_id' => 1, 'preference_id' => 3, 'recency_score' => 4.76],
            ['user_id' => 1, 'preference_id' => 4, 'recency_score' => 8.4],
            ['user_id' => 1, 'preference_id' => 5, 'recency_score' => 5.48],
            ['user_id' => 1, 'preference_id' => 6, 'recency_score' => 3.2],
            ['user_id' => 1, 'preference_id' => 7, 'recency_score' => 1.8],
            ['user_id' => 1, 'preference_id' => 8, 'recency_score' => 1]*/
        );

        foreach($availprefs as $availpref){
            $model = new AvailPref;
            $model->user_id = $availpref['user_id'];
            $model->preference_id = $availpref['preference_id'];
            $model->recency_score = $availpref['recency_score'];

            $model->save();
        }

        echo 'AvialPrefs population successfull';
    }

    public function populatePlaces(){
        $places = array(
            ['name' => 'The Bunk', 'location_id' => 1, 'suggestion_id' => 1, 'description' => 'Rooftop bar cum art gallery',
                'img_src' => 'http://rochelleabella.com/wp-content/uploads/2016/01/IMG_9107.jpg'],
            ['name' => 'Finders Keepers', 'location_id' => 1, 'suggestion_id' => 1, 'description' => 'Obscure warehouse lounge with an intimate long bar, curated music, crafted cocktails, draft & bottled beers',
                'img_src' => 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s640x640/sh0.08/e35/11925616_1047949228550818_1910383083_n.jpg']
        );

        foreach($places as $place){
            $model = new Place;
            $model->name = $place['name'];
            $model->location_id = $place['location_id'];
            //$model->suggestion_id = $place['suggestion_id'];
            $model->description = $place['description'];
            $model->img_src = $place['img_src'];

            $model->save();
        }

        echo 'Locations population successfull';
    }

    public function populateActivities(){
        $activities = array(
            ['suggestion_id' => 1, 'description' => 'Enjoy a glass of beer with some indie music and a great view of the city'],
            ['suggestion_id' => 1, 'description' => 'Get wasted with overpriced cocktails']
        );

        foreach($activities as $activity){
            $model = new Activity;
            $model->suggestion_id = $activity['suggestion_id'];
            //$model->place_id = $activity['place_id'];
            $model->description = $activity['description'];

            $model->save();
        }

        echo 'Activities population successfull';
    }

    public function populateActivityPlace(){
        $activityPlaces = array(
            ['activity_id' => 1, 'place_id' => 1], ['activity_id' => 1, 'place_id' => 2]
        );

        foreach($activityPlaces as $activityPlace){
            $model = Activity::find($activityPlace['activity_id']);
            $model->places()->attach($activityPlace['place_id']);
            //$model2 = Place::find($activityPlace['place_id']);
            //$model2->activities()->attach($activityPlace['activity_id']);

            //$model->save();
            //$model2->save();
        }

        echo 'Activity_Place population successfull';
    }
}
