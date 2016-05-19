$(document).ready(function() {
    $('select').material_select();

    $('.teacher-selector').change(function () {
        $button = $('.asign-teacher-button');
        subject_id = $button.data('subject');
        teacher_id = $(this).val();
        if(teacher_id != ""){
            $button.attr('href','/admin/controllers/asign.teacher.php?id_subject='+subject_id+'&id_teacher='+teacher_id);
        };
    })
});
