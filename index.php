<!DOCTYPE html>
<html>
<head>
    <title>Library Management System - Admin</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS Link -->
</head>
<body>

    <h2 class="title">Library Management System - Admin</h2>

    <form action="submit_admin.php" method="post" class="form-container">

        <!-- Admin Info -->
        <fieldset>
            <legend>Admin Information</legend>
            <table class="info-table">
                <tr>
                    <td><label for="fname">Full Name:</label></td>
                    <td><input type="text" name="admin_full_name" id="fname" required></td>
                </tr>
                <tr>
                    <td><label for="admin_id">Admin Id:</label></td>
                    <td><input type="text" name="admin_id" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="admin_email" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="admin_password" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="tel" name="admin_phone" required></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <select name="Gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>

        <!-- Library Info -->
        <fieldset>
            <legend>Library Information</legend>
            <table class="info-table">
                <tr>
                    <td>Library Branch:</td>
                    <td>
                        <select name="library_branch" required>
                            <option value="Main Branch">Main Branch</option>
                            <option value="Downtown Branch">Downtown Branch</option>
                            <option value="West Side Branch">West Side Branch</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Upload Library ID Proof:</td>
                    <td><input type="file" name="library_id_proof" ></td>
                </tr>
                <tr>
                    <td>Security Question:</td>
                    <td>
                        <select name="security_question" required>
                            <option value="pet">What is your pet's name?</option>
                            <option value="school">What was your first school's name?</option>
                            <option value="city">In which city were you born?</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Answer:</td>
                    <td><input type="text" name="security_answer" required></td>
                </tr>
            </table>
        </fieldset>

        <!-- Admin Role -->
        <fieldset>
            <legend>Admin Role</legend>
            <table class="info-table">
                <tr>
                    <td>Admin Role:</td>
                    <td>
                        <input type="radio" name="admin_role" value="Manager" required> Manager
                        <input type="radio" name="admin_role" value="Assistant"> Assistant
                    </td>
                </tr>
            </table>
        </fieldset>

        <!-- Submit -->
        <fieldset class="submit-box">
            <input type="submit" value="Register">
        </fieldset>

    </form>
</body>
</html>
