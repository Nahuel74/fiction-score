<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fiction Score!</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Shojumaru&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css\main-style.css">
        <link rel="stylesheet" type="text/css" href="css\index-style.css">
    </head>

    <body>
        <header id="topbar">
            <nav>
                <a href="index.php">NEW</a>
                <a href="html/list.php">LIST</a>
                <a href="html/login.php">LOG IN</a>
            </nav>
        </header>
        <main>

            <h1 id="main-title">RATE THE MOVIE</h1>

            <form>

                <header>

                    <input placeholder="Name" type="text" id="input-name" required="required">
                    <div>
                        <select id="select-category">
                            <option value="movie" class="option-category">Movie</option>
                            <option value="tv-show" class="option-category">TV Show</option>
                            <option value="anime" class="option-category">Anime</option>
                        </select>
                    </div>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>
                                <span class="th">Main<br>Character</span>
                            </th>
                            <th>
                                <span class="th">Secondary<br>Characters</span>
                            </th>
                            <th>
                                <span class="th">Antagonist</span>
                            </th>
                            <th>
                                <span class="th">Script</span>
                            </th>
                            <th>
                                <span class="th">Personal<br>Opinion</span>
                            </th>
                            <th>
                                <span class="th">Extra<br>points</span>
                            </th>
                            <th>
                                <span class="th">Score</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="td">
                                <input type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input
                                    type="number"
                                    min="0"
                                    max="10"
                                    class="input-table unlisted"
                                    id="extra-points">
                            </td>
                            <td class="td">
                                <input type="number" disabled="disabled" id="score">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <label>
                    "-1" will disable the cell</label>

                <button type="submit" id="submit">Save</button>
            </form>

        </main>
    </body>

    <script type="text/javascript" src="js/dynamic_calculator.js"></script>
    <script type="text/javascript" src="js/change_title.js"></script>

</html>