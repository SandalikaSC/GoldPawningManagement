<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Note Taking App</title>
    <style>
        .addNoteForm {
            /* margin: 20px 0; */
            display: flex;
            padding: 20px;
            flex-direction: column;
            width: 500px;
            border-radius: 10px;
            float: left;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);

        }

        .note-header {
            display: flex;
            justify-content: space-around;
            padding: 10px;
            border-bottom: 2px solid black;
        }

        .add-note {
            display: flex;
            flex: 1;
        }

        .add-note img {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .head-topic {
            font-size: x-large;
            font-weight: bold;
            flex: 5;
        }

        .note-footer {
            display: flex;
            flex-direction: column;

        }

        .note-viewer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: scroll;
            overflow-x: hidden;
            width: 100%;
            height: 250px;
            margin: auto;

        }

        .note-form {
            display: flex;
            flex-direction: column;
        }

        .note-form input,
        .note-form textarea {
            padding: 10px;
            margin: 5px 5px;
            border: 1px solid black;
            border-radius: 5px;
        }

        .note-form .savebtn {
            display: flex;
        }

        .note-form .savebtn button {
            margin: auto;
            width: 100%;
            margin: 0 5px;
            padding: 8px 10px;
            color: white;
            background-color: #BB8A04;
            border: none;
            border-radius: 5px;
        }

        .note-msg {
            display: flex;
            width: 100%;
            flex-direction: column;
            border: 2px solid black;
            border-radius: 5px;
            padding: 10px;
            margin: 5px 0px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);

        }

        @media screen and (max-width:511px) {

            .addNoteForm {
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <form class="addNoteForm" id="addNoteForm" action="<?php echo URLROOT ?>/ownerDashboard/setNote" method="POST">
        <div class="note-header">
            <div class="head-topic">NOTES</div>
            <div class="add-note">
                <button type="button" id="addNoteBtn">
                    <img src="<?php echo URLROOT ?>/img/notewrite.png" alt="newNote" />
                </button>
            </div>
        </div>
        <div class="note-footer">
            <div id="note-viewer" class="note-viewer">
                <?php
                if ($data[5] != 0) { ?>
                    <?php
                    $i = 1;
                    foreach ($data[5] as $row) { ?>

                        <div class="note-msg">
                            <div><?php echo $i ?>)<i><b><?php echo $row->Title ?></b></i></div>
                            <div><?php echo $row->Note ?></div>
                        </div>
                <?php $i++;
                    }
                } else {
                    echo "<center>No Notes</center>";
                } ?>

            </div>
            <div id="note-form" class="note-form" style="display: none">
                <input type="text" id="noteTitle" name="noteTitle" placeholder="Title" required />
                <input type="date" id="noteDate" name="noteDate" placeholder="Date" required />
                <textarea id="noteContent" name="noteContent" placeholder="Type Here" rows="4" cols="50" required></textarea>
                <div class="savebtn">
                    <button type="submit">SAVE</button>
                    <button type="button" id="cancelNoteBtn">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<script>
    let noteDisplay = document.getElementById("note-viewer");
    let noteForm = document.getElementById("note-form");

    let addNote = document.getElementById("addNoteBtn");
    let cancelNote = document.getElementById("cancelNoteBtn");

    addNote.addEventListener("click", () => {
        noteDisplay.style.display = "none";
        noteForm.style.display = "flex";
    });

    cancelNote.addEventListener("click", () => {
        noteDisplay.style.display = "flex";
        noteForm.style.display = "none";
    });
</script>

</html>