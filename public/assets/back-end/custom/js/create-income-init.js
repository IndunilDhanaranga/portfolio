function projectPicker(income_type){
    var income_type = $(income_type).val();
    console.log(income_type);
    if(income_type == 2){
        $('#project_id').removeClass('d-none');
    }else{
        $('#project_id').addClass('d-none');
    }
}
