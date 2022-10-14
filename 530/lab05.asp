<html>
    <head>
        <title>Lab 05 ASP</title>
        <link rel = "stylesheet" href = "./lab03.css">
        <link rel = "stylesheet" href = "./lab04.css">
        <style>
            .bodystyle3
            {
                background-color: <%=Request.QueryString("colour")%>;
            }
        </style>
    </head>
    <body class = "bodystyle2 bodystyle3">
        <form action = "./lab05.asp" method = "get">
            <h1>Please choose a background colour: </h1>
            <select name = "colour">
                <option value = "red">red</option>
                <option value = "blue">blue</option>
                <option value = "green">green</option>
                <option value = "white">white</option>
                <option value = "orange">orange</option>
                <option value = "yellow">yellow</option>
                <option value = "pink">pink</option>
                <option value = "purple">purple</option>
            </select>
            <br><br>
            <input type = "submit" value = "Submit" class = "buttonstyle2"/>
            <br><br>
            <%
                visit_time = Request.Cookies("last_visit")
                if visit_time = "" then
                        Response.Write("This is your first visit! Welcome!<br><br>")
                        Response.Write("Last Visited: " & "N/A")
                else
                        Response.Write("Last Visited: " & visit_time)
                end if
                Response.Cookies("last_visit") = now()
            %>
    </body>
</html>