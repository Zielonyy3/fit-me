const template = document.createElement('template');
template.innerHTML = `
<div class="card planned-exercise col-12 my-1"
     data-id="__VAL__">
    <div class="row card-header border-0">
        <div class="d-flex align-items-center col-md-8">
            <i class="handle fa-solid fa-bars" style="cursor: pointer;"></i>
            <p class="m-0 ml-3 section-name">__NAME__</p>
        </div>
        <div class="d-flex justify-content-end col-md-4">

        </div>
    </div>
</div>`;

export default class PlannedExercise {
    static render(id, name) {
        const $newEl = $($(template).get(0).cloneNode(true).innerHTML);

        $newEl.attr('data-id', id);
        $newEl.find('p.section-name').text(name);
        return $newEl;
    }
}
