import './bootstrap';

import PlannedExercise from "./components/PlannedExercise";
window.PlannedExercise = PlannedExercise;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Authorization': 'Bearer ' + $('meta[name="api_token"]').attr('content'),
    }
});
