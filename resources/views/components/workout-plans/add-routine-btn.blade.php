@props(['class' => ''])
<a href="#" class="add-routine-btn btn btn-dark disabled {{$class}}"
   data-bs-toggle="modal"
   data-bs-target="#add-routine-modal">
    {{__('common.add_routine')}}
    <i class="ti ti-plus" style="margin-left: 5px"></i>
</a>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        if(!window.add_routine_btn_events) {
            window.add_routine_btn_events = true;

            function toggleBtns(enable = true) {
                document.querySelectorAll('.add-routine-btn').forEach(btn => {
                    if (enable) btn.classList.remove('disabled');
                    else btn.classList.add('disabled');
                })
            }

            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('routine-card') || e.target.closest('.routine-card')) {
                    document.querySelectorAll('.routine-card').forEach(el => {
                        el.classList.remove('selected-card')
                    });
                    const currentRoutine = e.target.closest('.routine-card')
                    currentRoutine.classList.add('selected-card');
                    const routineId = currentRoutine.parentElement.dataset.id;
                    toggleBtns(false);
                    Livewire.emit('routineSelected', routineId)
                }
            });

            Livewire.on('routineLoaded', postId => {
                toggleBtns(true);
            })
        }
    });
</script>
