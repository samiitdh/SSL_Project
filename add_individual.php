<html>
<head>
    <meta charset="UTF-8">
    <title> add_individual </title>
</head>
    <body>
    <h2> Please enter relevant information </h2>
        <form action='add_individual_helper.php' method='POST'>
            <label for="name"> <b> Name </b> <br/>
                <input type="text" name="name"> <br/> <br/> 
            </label>
            <label for="r_number"> <b> Roll Number </b> <br/>
                <input type="number" name="r_number"> <br/> <br/> 
            </label>
            <label for="role">Choose a role:</label>
                <select id="role" name="role">
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                </select> <br/> <br/>  
            <label> 
                <input type="submit" value="add_individual"> 
            </label>
        </form>
    <p> Please note that the default password is: {role}_{roll number} </p>
    <p> Eg., student_190010024, faculty_180030045 </p>
    </body>
</html>
