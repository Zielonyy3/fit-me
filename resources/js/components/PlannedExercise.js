const template = document.createElement('template');
template.innerHTML = `
<div class="card planned-exercise col-12 my-1"
     data-id="__VAL__"
     data-planned-exercise-id="__VAL__"
     data-exercise-id="__VAL__"
     >
    <div class="row card-header border-0">
        <div class="d-flex align-items-center col-md-10 px-0">
            <div class="d-flex align-items-center w-100 justify-content-start">
                <i class="handle fa-solid fa-bars" style="cursor: pointer;"></i>
                <p class="m-0 ml-2 section-name" style="font-size: .9em;">__NAME__</p>
            </div>
            <div class="d-flex align-items-center ml-2 w-100">
                <input name="sets" placeholder="sets" class="mx-1 form-control" autocomplete="off" max="99" min="1" step="1">
                <span class="multiplier-symbol">X</span>
                <input name="target" placeholder="target" class="mx-1 form-control" autocomplete="off" max="1000" min="1">
                <select name="target_type" id="target_type" class="form-control mx-2">
                    <option value="weight">weight</option>
                    <option value="time">time</option>
                </select>
                <input name="rest_time" placeholder="rest_time" class="mx-1 form-control" autocomplete="off" max="1000" min="1" step="1" style="min-width: 70px">
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end col-md-2 px-0">
            <button class="btn btn-sm btn-danger delete-exercise-btn" type="button">
                <i style="font-size: 14px" class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>
</div>`;

export default class PlannedExercise {
    static render({
                      plannedExerciseId = '',
                      exerciseId,
                      name,
                      sets = 1,
                      target_type = 'weight',
                      target = 1,
                      rest_time = 45,
                  }) {
        const $newEl = $($(template).get(0).cloneNode(true).innerHTML);

        $newEl.attr('data-id', Math.floor(Math.random() * 1000000));
        $newEl.attr('data-planned-exercise-id', plannedExerciseId);
        $newEl.attr('data-exercise-id', exerciseId);
        $newEl.find('p.section-name').text(name);

        $newEl.find('[name="sets"]').val(sets)
        $newEl.find('[name="target_type"]').val(target_type)
        $newEl.find('[name="target"]').val(target)
        $newEl.find('[name="rest_time"]').val(rest_time)
        return $newEl;
    }

    static getData($el) {
        return {
            'planned_exercise_id': $el.attr('data-planned-exercise-id'),
            'exercise_id': $el.attr('data-exercise-id'),
            'sets': $el.find('[name="sets"]').val(),
            'target_type': $el.find('[name="target_type"]').val(),
            'target': $el.find('[name="target"]').val(),
            'rest_time': $el.find('[name="rest_time"]').val(),
        }
    }


}
