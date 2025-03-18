<!doctype html>
<html lang="nl">

<?php require_once "components/head.php" ?>

<body>
    <?php require_once "components/header.php" ?>

    <form action="controllers/taskcontroller.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="formGroupTask">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
        </div>
        <div class="formGroupTask">
            <label for="department">Afdeling:</label><br>
        </div>

        <div class="formGroupTask">
            <select name="department" id="departments">
                <option value="IT">IT</option>
                <option value="HR">Human Resources</option>
                <option value="Reception">Reception</option>
                <option value="Skibidi">Skibidi department</option>
            </select>
        </div>

        <div class="formGroupTask">
            <label for="priority">prioritet level:</label><br>
            <select name="priority">
                <option value="1">Laag</option>
                <option value="2" selected>Normaal</option>
                <option value="3">Hoog</option>
            </select>
        </div>

        <div class="formGroupTask">
            <label for="description">Description:</label>
            <textarea name="description"></textarea>

            <button type="submit">Submit</button>
    </form>
    </form>
</body>

</html>