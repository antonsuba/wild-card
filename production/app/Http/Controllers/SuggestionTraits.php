<?php
namespace App\Http\Controllers;

use App\Activity;
use App\Place;
use App\Location;
use App\Suggestion;

trait SuggestionTraits{
    public function getSuggestionDetails($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $name = $suggestion->name;
        $description = $suggestion->description;
        $location = Location::find($suggestion->location_id);
        $locationName = $location->name;

        $suggestionDetails = array($name, $description, $locationName);
        return $suggestionDetails;
    }

    public function getActivities($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $activities = $suggestion->activities()->get();

        return $activities;
    }

    public function getPlaces($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $activities = $suggestion->activities()->get();

        $i = 0;
        $places = array();
        foreach ($activities as $activity) {
            $place = $activity->place()->first();
            $places[$i] = $place;
            $i++;
        }

        return $places;
    }
}