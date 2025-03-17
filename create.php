<!doctype html>
<html lang="nl">
<form action="../controllers/taskcontroller.php" method="POST">
    <div class="formgroup">
        <label for="title">Titel</label><br>
    </div>
    <div class="formgroup">
        <input type="text" id="title" name="title"><br>
    </div>
    <div class="formgroup">
        <label for="department">Afdeling:</label><br>
    </div>
    <div class="formgroup">
        <select name="department" id="departments">
            <option value="IT">IT</option>
            <option value="HR">Human Resources</option>
            <option value="Reception">Reception</option>
            <option value="Skibidi">Skibidi department</option>
        </select>
    </div>
    <div class="formgroup">
        <label for="task">Taak:</label><br>
        <textarea id="task" name="task" rows="4" cols="50"></textarea>
    </div>
    <input type="submit" value="submit"></input>
</form>

</html>