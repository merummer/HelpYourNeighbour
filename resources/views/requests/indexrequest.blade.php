<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilfsanfragen</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="mt-5">
   <h2>Hilfe benötigt...</h2>
    <!-- foreach für offene Hilfsangebote -->

        <!-- Info der Anfrage -->

    <!-- Button zum abschließen der Hilfsanfrage-->
    <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#hilfsanfrage">
        Abschließen
    </button>

    <!-- Fenster für die Bewertung der helfenden Person-->
    <div class="modal fade" id="hilfsanfrage" tabindex="-1" role="dialog" aria-labelledby="hilfsanfrageabschließen" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hilfsanfrageabschließen">Wie zufrieden waren Sie mit Ihrem Helfer?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bewerten Sie Ihren Helfer bzw. Ihre Helferin.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bewertung absenden und Anfrage schließen</button>
                    <!-- Weitere Aktionen können hier hinzugefügt werden -->
                    </div>
                </div>
            </div>
        </div>
<!-- endforeach -->
</div>

<div class="mt-5">
<h2>Hilfe angeboten...</h2>

    <!-- foreach für offene Hilfsangebote -->

    <!-- Info der Anfrage -->

    <!-- Button zum abschließen des Hilfsangebot -->
    <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#hilfsangebot">
        Abschließen
    </button>

    <!-- Fenster für die Bewertung der anfragenden Person -->
    <div class="modal fade" id="hilfsangebot" tabindex="-1" role="dialog" aria-labelledby="hilfsangebotabschließen" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hilfsangebotabschließen">Wie zufrieden waren Sie mit der hilfesuchenden Person?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bewerten Sie Ihren Kontakt mit der Person die Hilfe benötigte.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bewertung absenden und Anfrage schließen</button>
                    <!-- Weitere Aktionen können hier hinzugefügt werden -->
                    </div>
                </div>
            </div>
        </div>
    <!-- endforeach -->
</div>

<div class="mt-5">
    <h2>Anfragen von Nutzern</h2>
</div>


<!--
<div class="container mt-5">
    <h1>Laravel Popup Example</h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Öffne Popup
    </button>

    <!- Das Popup-Fenster ->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Popup Titel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Inhalt des Popups hier...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                    <!- Weitere Aktionen können hier hinzugefügt werden ->
                </div>
            </div>
        </div>
    </div>
</div>-->

<!-- Fügen Sie jQuery und Bootstrap JS hinzu (stellen Sie sicher, dass Sie sie eingebunden haben) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
