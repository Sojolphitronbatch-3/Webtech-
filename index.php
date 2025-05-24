<!DOCTYPE html>
<html>
<head>
    <title>Library Management System - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    $form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
    unset($_SESSION['errors']);
    unset($_SESSION['form_data']);
    ?>

    <div class="container">
        <h2>Library Management System - Admin Registration</h2>
        
        <form action="validate.php" method="post" class="form-container" enctype="multipart/form-data">
            
            <!-- Admin Information -->
            <fieldset>
                <legend>Admin Information</legend>
                <table class="info-table">
                    <tr>
                        <td><label for="fname">Full Name:</label></td>
                        <td>
                            <input type="text" name="admin_full_name" id="fname" 
                                   value="<?php echo isset($form_data['admin_full_name']) ? htmlspecialchars($form_data['admin_full_name']) : ''; ?>"
                                   class="<?php echo isset($errors['fname']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['fname'])): ?>
                                <span class="error-message"><?php echo $errors['fname']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="admin_id">Admin ID:</label></td>
                        <td>
                            <input type="text" name="admin_id" id="admin_id" 
                                   value="<?php echo isset($form_data['admin_id']) ? htmlspecialchars($form_data['admin_id']) : ''; ?>"
                                   class="<?php echo isset($errors['admin_id']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['admin_id'])): ?>
                                <span class="error-message"><?php echo $errors['admin_id']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="admin_email">Email:</label></td>
                        <td>
                            <input type="email" name="admin_email" id="admin_email" 
                                   value="<?php echo isset($form_data['admin_email']) ? htmlspecialchars($form_data['admin_email']) : ''; ?>"
                                   class="<?php echo isset($errors['email']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['email'])): ?>
                                <span class="error-message"><?php echo $errors['email']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="admin_password">Password:</label></td>
                        <td>
                            <input type="password" name="admin_password" id="admin_password"
                                   class="<?php echo isset($errors['password']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['password'])): ?>
                                <span class="error-message"><?php echo $errors['password']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="admin_phone">Phone Number:</label></td>
                        <td>
                            <input type="tel" name="admin_phone" id="admin_phone" 
                                   value="<?php echo isset($form_data['admin_phone']) ? htmlspecialchars($form_data['admin_phone']) : ''; ?>"
                                   class="<?php echo isset($errors['phone']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['phone'])): ?>
                                <span class="error-message"><?php echo $errors['phone']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Gender:</label></td>
                        <td>
                            <select name="Gender" class="<?php echo isset($errors['gender']) ? 'error-input' : ''; ?>">
                                <option value="Male" <?php echo (isset($form_data['Gender']) && $form_data['Gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (isset($form_data['Gender']) && $form_data['Gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo (isset($form_data['Gender']) && $form_data['Gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                            <?php if(isset($errors['gender'])): ?>
                                <span class="error-message"><?php echo $errors['gender']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Library Information -->
            <fieldset>
                <legend>Library Information</legend>
                <table class="info-table">
                    <tr>
                        <td><label>Library Branch:</label></td>
                        <td>
                            <select name="library_branch" class="<?php echo isset($errors['library_branch']) ? 'error-input' : ''; ?>">
                                <option value="Main Branch" <?php echo (isset($form_data['library_branch']) && $form_data['library_branch'] == 'Main Branch') ? 'selected' : ''; ?>>Main Branch</option>
                                <option value="Downtown Branch" <?php echo (isset($form_data['library_branch']) && $form_data['library_branch'] == 'Downtown Branch') ? 'selected' : ''; ?>>Downtown Branch</option>
                                <option value="West Side Branch" <?php echo (isset($form_data['library_branch']) && $form_data['library_branch'] == 'West Side Branch') ? 'selected' : ''; ?>>West Side Branch</option>
                            </select>
                            <?php if(isset($errors['library_branch'])): ?>
                                <span class="error-message"><?php echo $errors['library_branch']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Upload Library ID Proof:</label></td>
                        <td>
                            <input type="file" name="library_id_proof" class="<?php echo isset($errors['library_id_proof']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['library_id_proof'])): ?>
                                <span class="error-message"><?php echo $errors['library_id_proof']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Security Question:</label></td>
                        <td>
                            <select name="security_question" class="<?php echo isset($errors['security_question']) ? 'error-input' : ''; ?>">
                                <option value="pet" <?php echo (isset($form_data['security_question']) && $form_data['security_question'] == 'pet') ? 'selected' : ''; ?>>What is your pet's name?</option>
                                <option value="school" <?php echo (isset($form_data['security_question']) && $form_data['security_question'] == 'school') ? 'selected' : ''; ?>>What was your first school's name?</option>
                                <option value="city" <?php echo (isset($form_data['security_question']) && $form_data['security_question'] == 'city') ? 'selected' : ''; ?>>In which city were you born?</option>
                            </select>
                            <?php if(isset($errors['security_question'])): ?>
                                <span class="error-message"><?php echo $errors['security_question']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Answer:</label></td>
                        <td>
                            <input type="text" name="security_answer" 
                                   value="<?php echo isset($form_data['security_answer']) ? htmlspecialchars($form_data['security_answer']) : ''; ?>"
                                   class="<?php echo isset($errors['security_answer']) ? 'error-input' : ''; ?>">
                            <?php if(isset($errors['security_answer'])): ?>
                                <span class="error-message"><?php echo $errors['security_answer']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Admin Role -->
            <fieldset>
                <legend>Admin Role</legend>
                <table class="info-table">
                    <tr>
                        <td><label>Admin Role:</label></td>
                        <td>
                            <div class="radio-group <?php echo isset($errors['admin_role']) ? 'error-radio' : ''; ?>">
                                <input type="radio" name="admin_role" value="Manager" id="manager" 
                                       <?php echo (isset($form_data['admin_role']) && $form_data['admin_role'] == 'Manager') ? 'checked' : ''; ?>>
                                <label for="manager">Manager</label>
                                
                                <input type="radio" name="admin_role" value="Assistant" id="assistant"
                                       <?php echo (isset($form_data['admin_role']) && $form_data['admin_role'] == 'Assistant') ? 'checked' : ''; ?>>
                                <label for="assistant">Assistant</label>
                            </div>
                            <?php if(isset($errors['admin_role'])): ?>
                                <span class="error-message"><?php echo $errors['admin_role']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Submit Button -->
            <div class="submit-container">
                <input type="submit" value="Register" class="btn-submit">
            </div>
        </form>
    </div>
</body>
</html>