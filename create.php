<!doctype html>
<html lang="nl">
    <form action="../controllers/taskcontroller.php" method="POST">
        <label for="title">Titel</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="department">Afdeling:</label><br>
        <select name="department" id="departments">
            <option value="IT">IT</option>
            <option value="HR">Human Resources</option>
            <option value="Reception">Reception</option>
            <option value="Skibidi">Skibidi department</option>
            
        </select>
        <label for="task">Taak:</label><br>
        <textarea id="task" name="task" rows="4" cols="50"></textarea>
    </form>
</html>