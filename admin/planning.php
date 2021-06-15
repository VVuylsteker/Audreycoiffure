<?php
require_once('db_connect.php');


session_start();
$id = $_GET['id'];

$req1 = get_bdd()->query('SELECT * FROM prestations');
$events = get_bdd()->query("SELECT id, titre, debut, fin, couleur, id_salaries, valide FROM rdv WHERE id_salaries='$id' AND valide='1'")->fetchAll();
$donnees = get_bdd()->query("SELECT nom, prenom, jour_de_travail FROM salaries WHERE id='$id'")->fetch();

$nom = $donnees['nom'];
$prenom = $donnees['prenom'];

$jour_de_travail = (explode( ',', $donnees['jour_de_travail']));

$travail = [];
if(in_array('dimanche', $jour_de_travail)){
    $travail[] = '0';
}
if(in_array('lundi', $jour_de_travail)){
    $travail[] = '1';
}
if(in_array('mardi', $jour_de_travail)){
    $travail[] = '2';
}
if(in_array('mercredi', $jour_de_travail)){
    $travail[] = '3';
}
if(in_array('jeudi', $jour_de_travail)){
    $travail[] = '4';
}
if(in_array('vendredi', $jour_de_travail)){
    $travail[] = '5';
}
if(in_array('samedi', $jour_de_travail)){
    $travail[] = '6';
}

$array1 = array("0", "1", "2", "3", "4", "5", "6");
$result = array_diff($array1, $travail);
$a = implode(",", $result);


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Planning - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
        <?php require_once('includes/header.php'); ?>

                <!-- CDN menu-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <!-- CDN fullcalendar-->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/locales-all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">

    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Le planning de <?php echo $nom." ".$prenom ?></h1>

                     <!-- Modal ajouter rendez-vous -->
                     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter un rendez-vous</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="ajouter_rdv.php">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="nom">Nom Prénom</label>
                                                <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                           <label for="prestation">Prestation</label>
                                            <select class="form-control" id="prestation" name="prestation" required>
                                                <option value="">Choisir</option>
                                                <?php while ($donnees1 = $req1->fetch()){ ?>
                                                <option value="<?php echo $donnees1['nom']; ?>"><?php echo $donnees1['nom'] ?></option>
                                                <?php } ?>
                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
 
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="debut" class="control-label">Date début</label>
                                                <input type="datetime-local" name="debut" class="form-control" id="debut">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="fin" class="control-label">Date fin</label>
                                                <input type="datetime-local" name="fin" class="form-control" id="fin">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="couleur" class="control-label">Couleur</label>
                                            <select name="couleur" class="form-control" id="couleur">
                                                <option value="">Choisir</option>
                                                <option style="color:#0071c5;" value="#0071c5">&#9724; Bleu</option>
                                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                <option style="color:#008000;" value="#008000">&#9724; Vert</option>						  
                                                <option style="color:#FFD700;" value="#FFD700">&#9724; Jaune</option>
                                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
                                                <option style="color:#000;" value="#000">&#9724; Noir</option>
                                            </select>
                                        </div>
                                        </div>                                        <div class="form-group">
                                            <label for="commentaire">Commentaire</label>
                                            <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
                                        </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="ajouter_rdv" class="btn btn-primary">Ajouter</button>
                                        </div>
                             </form>
                                </div>

                            </div>
                            </div>
                    <!-- Fin du Modal -->
                    
                    <!-- Modal modifier rendez-vous -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modifier">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier le rendez-vous</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="edit_rdv.php">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nom">Nom Prénom</label>
                                                    <input type="text" class="form-control" id="nom_prenom" name="nom_prenom">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="prestation">Prestation</label>
                                                <input type="text" class="form-control" id="prestation" name="prestation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="debut" class="control-label">Début du rdv</label>
                                                    <input type="time" name="debut" class="form-control" id="debut">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="fin" class="control-label">Fin du rdv</label>
                                                    <input type="time" name="fin" class="form-control" id="fin">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="couleur" class="control-label">Couleur</label>
                                            <select name="couleur" class="form-control" id="couleur">
                                                <option value="">Choisir</option>
                                                <option style="color:#0071c5;" value="#0071c5">&#9724; Bleu</option>
                                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                <option style="color:#008000;" value="#008000">&#9724; Vert</option>						  
                                                <option style="color:#FFD700;" value="#FFD700">&#9724; Jaune</option>
                                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
                                                <option style="color:#000;" value="#000">&#9724; Noir</option>
                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="commentaire">Commentaire</label>
                                            <textarea class="form-control" name="commentaire" id="commentaire" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label>Gestion du rendez-vous</label>
                                            </div>
                                                <div class="form-group col-md-6 text-center">
                                                
                                                <div class="checkbox">
                                                <label class="text-danger"><input type="checkbox" id="check_annuler"  name="annuler" onclick="check1();"> Annuler le rendez-vous</label>
                                            </div>
                                                </div>
                                                <div class="form-group col-md-6 text-center">
                                                <div class="checkbox">
                                                <label class="text-danger"><input type="checkbox"  id="check_delete" name="delete" onclick="check2();"> Supprimmer le rendez-vous</label>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="id_rdv" id="id_rdv">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Sauvegarder</button>
                                        </div>
                             </form>
                                </div>

                            </div>
                            </div>
                    <!-- Fin du Modal -->

                            <script>

                                document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    height: '100%',
                                    expandRows: true,
                                    allDayText: 'Autres',
                                    navLinks: true,
                                    hiddenDays: [<?php echo $a ?>],

                                    //entête
                                    headerToolbar: {
                                        left: 'prev,next today',
                                        center: 'title',
                                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                                    },
                                    // Paramètre du bouton custom
                                    customButtons: {
                                        ajouter_rdv: {
                                        text: 'Ajouter un rendez-vous',
                                        click: function() {
                                            $('#myModalLabel').modal('show');
                                        }
                                        },
                                        print: {
                                        icon: 'fa fa fa-print',
                                        click: function() {
                                            window.print();
                                        }
                                        }
                                    },
                                    // Thème
                                    themeSystem: 'standard',
                                    // Vue du calendrier par défaut en semaine
                                    initialView: 'timeGridWeek',
                                    // traduction en français
                                    locale: 'fr',

                                    // Détermine le premier et le dernier créneau horaire qui sera affiché pour chaque jour
                                    slotMinTime:"08:00:00",
                                    slotMaxTime:"19:00:00",
                                    // Fréquence d'affichage des plages horaires
                                    slotDuration:'00:15:00',
                                    //Permet à un utilisateur de mettre en évidence plusieurs jours ou plages horaires en cliquant et en faisant glisser
                                    selectable: true,
                                    editable: true,
                                    //Fonction qui permet d'ouvrir le modal pour ajouter un rendez-vous
                                    select: function(info) {
                                        $('#debut').val(info.startStr.substr(0,16));
                                        $('#fin').val(info.endStr.substr(0,16));
                                        $('#myModalLabel').modal('show');
                                    },
                                    selectMirror:true,
                                    eventStartEditable:true,
                                    eventDurationEditable:true,
                                    eventResizableFromStart:true,

                                    eventDrop: function(info, event) { // si changement de position
                                        
                                        Event = [];
                                        Event[0] = info.event.id;
                                        Event[1] = info.event.startStr;
                                        Event[2] = info.event.endStr;

                                        $.ajax({
                                            url: 'ajouter_rdv.php',
                                            type: "POST",
                                            data: {Event:Event},
                                        });
                                    },
                                    eventResize: function(info, event) { // si changement de longueur

                                        Event = [];
                                        Event[0] = info.event.id;
                                        Event[1] = info.event.startStr;
                                        Event[2] = info.event.endStr;

                                        $.ajax({
                                            url: 'ajouter_rdv.php',
                                            type: "POST",
                                            data: {Event:Event},
                                        });
                                    },
                                    eventClick: function(info) {
                                        $('#id_rdv').val(info.event.id);
                                        var event_array = info.event.title.split("|");
                                        
                                        $('#modifier #nom_prenom').val(event_array[0]);
                                        $('#modifier #prestation').val(event_array[1]);
                                        $('#modifier #commentaire').val(event_array[2]);

                                        $('#modifier #debut').val(info.event.startStr.substr(11, 5));
                                        $('#modifier #fin').val(info.event.endStr.substr(11, 5));
                                        $('#modifier').modal('show');
                                    },
                                    // Evenement
                                events: [
                                                <?php foreach($events as $event): 
                                                    $start = explode(" ", $event['debut']);
                                                    $end = explode(" ", $event['fin']);
                                                    if($start[1] == '00:00:00'){
                                                        $start = $start[0];
                                                    }else{
                                                        $start = $event['debut'];
                                                    }
                                                    if($end[1] == '00:00:00'){
                                                        $end = $end[0];
                                                    }else{
                                                        $end = $event['fin'];
                                                    }
                                                ?>
                                                    {
                                                        id: '<?php echo $event['id']; ?>',
                                                        title: '<?php echo $event['titre']; ?>',
                                                        description: 'Coupe Homme',
                                                        start: '<?php echo $start; ?>',
                                                        end: '<?php echo $end; ?>',
                                                        backgroundColor: '<?php echo $event['couleur']; ?>',
                                                        borderColor:'<?php echo $event['couleur']; ?>',
                                                        textColor:'white',
                                                    },
                                                <?php endforeach; ?>
                                            ]
                                });

                                calendar.render();
                                });
                                function check1() {
                                    if( $('check_annuler').is(':checked') ){
                                    } else {
                                        $("#check_delete").prop("checked", false);
                                    }   
                                }
                                function check2() {
                                    if( $('check_delete').is(':checked') ){
                                    } else {
                                        $("#check_annuler").prop("checked", false);
                                    }

                                            
                                }
                            </script>
                            <style>

                            html, body {
                            overflow: hidden; /* don't do scrollbars */
                            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;

                            }

                            #calendar-container {
                            position: absolute;
                            top: 100px;
                            left: 250px;
                            right: 10px;
                            bottom: 100px;
                            }


                            </style>

                        <div id='calendar-container'>
                            <div id='calendar'>
                            </div>
                        </div>


                </main>
                <?php require_once('includes/footer.php'); ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
