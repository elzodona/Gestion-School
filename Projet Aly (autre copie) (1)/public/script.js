
setTimeout(function () {
    var successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 1000);

setTimeout(function () {
    var errorAlert = document.querySelector('.alert-danger');
    if (errorAlert) {
        errorAlert.style.display = 'none';
    }
}, 1000);


// chargements classes, groupe de disciplines et disciplines

function chargerData(val, action) {
    $.ajax({
        url: 'http://localhost:4000/discipline/gestion',
        type: 'POST',
        dataType: 'json',
        data: {
            action: action,
            [action === 'chargerClasses' ? 'niveau' : 'classe']: val,
            groupe: val
        },
        success: function (data) {
            if (data.success) {

                if (action === 'chargerClasses') {
                    var selectClasses = $('#select-classes');
                    selectClasses.empty();

                    selectClasses.append($('<option></option>').val('').text('Sélectionner une classe'));

                    $.each(data.data.classes, function (index, classe) {
                        selectClasses.append($('<option></option>').val(classe.nom_classe).text(classe.nom_classe));
                    });

                } else if (action === 'chargerGroupeDisciplines') {
                    // // charger groupe de disciplines
                    var selectGroupes = $('#select-groupe');
                    selectGroupes.empty();

                    selectGroupes.append($('<option></option>').val('').text('Sélectionner un groupe'));
                    selectGroupes.append($('<option></option>').val('new').text('Nouveau'));

                    $.each(data.data.groupes, function (index, groupe) {
                        selectGroupes.append($('<option></option>').val(groupe.id).text(groupe.libelle));
                    });

                    // charger disciplines
                    var disciplinesContainer = $('#disciplines-container');
                    disciplinesContainer.empty();
                    var disciplines = data.data.discipline;
                    var row = $('<div></div>').addClass('row justify-content-center');
                    var count = 0;

                    if (disciplines.length === 0) {
                        var message = $('<div></div>').addClass('no-disciplines-message text-center').text('Pas encore de disciplines pour cette classe');
                        disciplinesContainer.append(message);
                    } else {
                        $.each(disciplines, function (index, discipline) {
                            var column = $('<div></div>').addClass('col-md-4 discipline-column');
                            var checkboxId = 'discipline-' + discipline.id;
                            var checkbox = $('<input>').attr({
                                type: 'checkbox',
                                id: checkboxId,
                                name: 'discipline[]',
                                value: discipline.id,
                                checked: 'checked'
                            }).addClass('discipline-checkbox');;

                            checkbox.on('change', function () {
                                if ($(this).is(':checked')) {
                                    $(this).parent().removeClass('unchecked');
                                } else {
                                    $(this).parent().addClass('unchecked');
                                }
                            });

                            var label = $('<label></label>').attr('for', checkboxId).text(discipline.nom + ' ' + discipline.code);
                            column.append(checkbox).append(label);
                            row.append(column);
                            count++;

                            if (count % 3 === 0) {
                                disciplinesContainer.append(row);
                                row = $('<div></div>').addClass('row justify-content-center');
                            }
                        });

                        if (count % 3 !== 0) {
                            disciplinesContainer.append(row);
                        }
                    }

                } else if (action === 'chargerDisciplines') {
                    var disciplinesContainer = $('#disciplines-container');
                    disciplinesContainer.empty();
                    var disciplines = data.data.disciplines;
                    var row = $('<div></div>').addClass('row justify-content-center');
                    var count = 0;

                    if (disciplines.length === 0) {
                        var message = $('<div></div>').addClass('no-disciplines-message text-center').text('Pas encore de disciplines pour cette classe');
                        disciplinesContainer.append(message);
                    } else {
                        $.each(disciplines, function (index, discipline) {
                            var column = $('<div></div>').addClass('col-md-4 discipline-column');
                            var checkboxId = 'discipline-' + discipline.id;
                            var checkbox = $('<input>').attr({
                                type: 'checkbox',
                                id: checkboxId,
                                name: 'discipline[]',
                                value: discipline.id,
                                checked: 'checked'
                            }).addClass('discipline-checkbox');;

                            checkbox.on('change', function () {
                                if ($(this).is(':checked')) {
                                    $(this).parent().removeClass('unchecked');
                                } else {
                                    $(this).parent().addClass('unchecked');
                                }
                            });

                            var label = $('<label></label>').attr('for', checkboxId).text(discipline.nom + ' ' + discipline.code);
                            column.append(checkbox).append(label);
                            row.append(column);
                            count++;

                            if (count % 3 === 0) {
                                disciplinesContainer.append(row);
                                row = $('<div></div>').addClass('row justify-content-center');
                            }
                        });

                        if (count % 3 !== 0) {
                            disciplinesContainer.append(row);
                        }
                    }
                }
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}


$(document).ready(function () {

    $('#select-classes').change(function () {
        var label = $('#disciplines-label');
        var labelText = label.text();
        labelText = 'Disciplines de la classe' + ' ';
        var newPhrase = labelText + $('#select-classes').val();
        label.text(newPhrase);

    });
});


// ajout de groupe de discipline

$(document).ready(function () {
    $('#select-groupe').change(function () {
        var selectedValue = $(this).val();

        if (selectedValue === 'new') {
            $('#newgrp-container').show();
        } else {
            $('#newgrp-container').hide();
        }
    });

    $('#addGrp').on('click', function () {
        var newgrpValue = $('#disc').val();
        var classeValue = $('#select-classes').val();
        $('#newgrp-container').hide();

        $.ajax({
            url: 'http://localhost:4000/discipline/gestion',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'insertGrp',
                newgrp: newgrpValue,
                classe: classeValue
            },
            success: function (data) {
                if (data.success) {
                    chargerData($('#select-classes').val(), 'chargerGroupeDisciplines');

                    // var groupes = data.data.groupes;
                    // var lastAddedGroupe = groupes[groupes.length - 1];
                    // $('#select-groupe').val(lastAddedGroupe.id);


                } else {
                    var message = "Erreur lors de l'insertion";
                    alert(data.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});



// ajout de discipline

$(document).ready(function () {
    var selectedGroupeValue; 

    $('#select-groupe').change(function () {
        var selectedValue = $(this).val();

        if (selectedValue === 'new') {
            $('#newgrp-container').show();
        } else {
            $('#newgrp-container').hide();
        }

        selectedGroupeValue = selectedValue;

        let $new=$('#disc').val();
        $('#select-groupe').val()=$new;

    });

    $('#addDisc').on('click', function () {
        var newdiscValue = $('#disci').val();
        var groupeValue = selectedGroupeValue;
        var classeValue = $('#select-classes').val();
        var codeValue = '(' + newdiscValue.substring(0, 4).toUpperCase() + ')';

        // if (groupeValue.indexOf(' ') === -1) {
        //     codeValue = '(' + newdiscValue.substring(0, 4).toUpperCase() + ')';
        // } else {
        //     var words = groupeValue.split(' ');

        //     if (words.length <= 1) {
        //         codeValue = '(' + newdiscValue.substring(0, 4).toUpperCase() + ')';
        //     } else if (words.length <= 3) {
        //         var firstLetters = words.slice(0, 2).map(function (word) {
        //             return word.substring(0, 2).toUpperCase();
        //         });
        //         codeValue = '(' + firstLetters.join('') + ')';
        //     } else {
        //         codeValue = '(' + words[0].substring(0, 2).toUpperCase() + words[1].substring(0, 2).toUpperCase() + ')';
        //     }
        // }
    

        $.ajax({
            url: 'http://localhost:4000/discipline/gestion',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'insertDISC',
                newdisc: newdiscValue,
                groupe: groupeValue,
                classe: classeValue,
                code: codeValue
            },
            success: function (data) {
                if (data.success) {
                    chargerData($('#select-classes').val(), 'chargerGroupeDisciplines');                  
                    // chargerData(selectedGroupeValue, 'chargerDisciplines');
                    $('#select-groupe').val(selectedGroupeValue);
                    $('#disci').val('');
                    
                } else {
                    alert('Erreur lors de l\'insertion de la discipline: ' + data.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// delete discipline

$(document).ready(function () {
    $('#update-button').on('click', function () {
        var unselectedDisciplines = $('.discipline-checkbox:not(:checked)');
        var disciplineNames = unselectedDisciplines.map(function () {
            return $(this).siblings('label').text().split(' ').slice(0, -1).join(' ');
        }).get();

        // if (disciplineNames.length > 0) {
        //     var message = "Disciplines non sélectionnées :\n";
        //     // message += disciplineNames.join("\n");
        //     alert(message);
        // } else {
        //     alert("Toutes les disciplines sont sélectionnées.");
        // }

        $.ajax({
            url: 'http://localhost:4000/discipline/gestion',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'supprimerDisciplines',
                discipline: disciplineNames
            },
            success: function (response) {
                if (response.success) {
                    // chargerData($('#select-groupe').val(), 'chargerDisciplines');
                    chargerData($('#select-classes').val(), 'chargerGroupeDisciplines');

                } else {
                    alert('Suppression non reussi');
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});









