
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, user! - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <link href="../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="bpso.css">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Onboarding as BPSO Officer for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as BPSO Officer for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <nav class="sidebar" style="z-index: 1000;">
            <div class="sidebar-content">
                <div class="sidebar-header">Brgy. Sta. Lucia</div>

               
                <div class="sidebar-category">
                    <div class="sidebar-category-header" onclick="toggleSubMenu()">
                        <span><i class="fas fa-shield-alt category-icon"></i>Brgy. Public Safety Officer</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu-show">
                        <div class="sidebar-submenu-item" onclick="showSection('dasboardsection')">Dashboard</div>
                        <div class="sidebar-submenu-item" onclick="showSection('complaintsection')">Complaints</div>
                        <div class="sidebar-submenu-item" onclick="showSection('newcomplaintsection')">New Complaint</div>
                        <div class="sidebar-submenu-item" onclick="showSection('reportsection')">Create Report</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fa-solid fa-id-card category-icon"></i>User Profile</span>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header" data-bs-toggle="modal" data-bs-target="#signOutModal">
                        <span><i class="fa-solid fa-door-open category-icon"></i>Sign Out</span>
                    </div>
                </div>
            </div>
        </nav>



      
        <section id="dasboardsection">
            <div style="position: relative; top: 0; left: 0; height: 104px; width: 100%; border: 1px solid #d4d4d4; background-color: #ffffff; display: flex; align-items: center; padding-left: 20%; ">
                <h1 style="font-size: 2rem;">DASHBOARD</h1>
            </div>
            
            
            
            <div style="margin-top: 13px; padding: 20px; height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff;">

        
            </section>


      



        </div>



         <!-- Complaint management-->
        <section id="complaintsection"  style="display: none;">
            <div style="position: relative; top: 0; left: 0; height: 104px; width: 100%; border: 1px solid #d4d4d4; background-color: #ffffff; display: flex; align-items: center; padding-left: 20%; ">
                <h1 style="font-size: 2rem;">COMPLAINT</h1>
            </div>
            
            
            
            <div style="margin-top: 13px; padding: 20px; height: 100vh; width: 100%; box-sizing: border-box; background-color: #ffffff; display: flex; flex-direction: column; align-items: flex-start;">
    <input type="text" id="search-input" placeholder="Search..." onkeyup="filterTable()" style="padding: 10px; width: 70%; max-width: 700px; margin-top: 50px; margin-left: 400px;"> 

    <!-- Category dropdown -->
    <div class="dropdown" style="display: flex; justify-content: flex-start; align-items: center; margin-top: 100px; margin-left: 400px;"> 
        <button id="dropdownButton" class="btn btn-info dropdown-toggle btn-hover" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: block; width: 300px; height: 50px; font-size: 20px; background-color: #ffffff; border: 1px solid #b1b1b1;">
            Category
        </button>
        <ul class="dropdown-menu" style="z-index: 2;">
            <li><a class="dropdown-item" href="#" onclick="selectCategory('Minor case')">Minor case</a></li>
            <li><a class="dropdown-item" href="#" onclick="selectCategory('Major case')">Major case</a></li>
        </ul>
    </div>

    <!-- Case table -->
    <?php
    include 'C:\xampp\htdocs\SUPERHERO-SYSTEM\controllers\db_connection.php';
    $sql = "SELECT * FROM complaint"; 

    try {
        $stmt = $pdo->query($sql); 
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        exit; 
    }

    echo '<table id="tablecase" class="table table-bordered" style="width: 100%; max-width: 1500px; border: 1px solid #d4d4d4; text-align: center; margin-top: 150px; margin-left: 400px;"> 
            <thead>
                <tr>
                    <th scope="col">Case Number</th>
                    <th scope="col">Complainant Name</th>
                    <th scope="col">Respondent Name</th>
                    <th scope="col">Complaint Category</th>
                    <th scope="col">Date of Incident</th>
                    <th scope="col">Special Case</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>';

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
            <th scope='row'>" . htmlspecialchars($row["case_number"]) . "</th>
            <td>" . htmlspecialchars($row["complainant_name"]) . "</td>
            <td>" . htmlspecialchars($row["respondent_name"]) . "</td>
            <td>" . htmlspecialchars($row["complaint_category"]) . "</td>
            <td>" . htmlspecialchars($row["date_of_incident"]) . "</td>
            <td>" . htmlspecialchars($row["special_case"]) . "</td>
            <td>
                <button type='submit' class='btn btn-success btn-hover' style='font-weight: 500;'>See details</button>
                <button type='submit' class='btn btn-danger btn-hover' style='font-weight: 500;'>Forward</button>
            </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No table record</td></tr>";
    }
    echo '</tbody></table>';
    $pdo = null; 
    ?>
</div>



        </section>

<!-- new complaint section -->
<section id="newcomplaintsection" style="display: none;">
            

    <div style="position: relative; top: 0; left: 0; height: 104px; width: 100%; border: 1px solid #d4d4d4; background-color: #ffffff; display: flex; align-items: center; padding-left: 20%; ">
        <h1 style="font-size: 2rem;">NEW COMPLAINT</h1>
    </div>
    
    
    
    <div style="margin-top: 13px; padding: 20px; height: 180vh; width: 100%; box-sizing: border-box; background-color: #ffffff;">
        <form action="../../../../../controllers/departments/BPSO/complaint.php" method="POST" style="max-width: 1200px; margin: 0 auto;">
    
            <!-- Complainant Section -->
            <div style="display: flex; justify-content: space-between; gap: 20px; margin-bottom: 30px;">
                <!-- Complainant Section -->
                <div style="flex: 1;">
                    <label style="font-size: 20px; font-weight: 600;">Complainant 1</label>
                    <div  id="complainant-container" style="display: flex; flex-direction: column; gap: 10px;">
                        <input type="text" name="complainant_name" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                        <input type="text" name="complainant_address" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                    </div>
                    <button type="button" onclick="addComplainant()" style="margin-top: 10px; font-size: 20px; background-color: #009717; color: #ffffff; border-radius: 50%; width: 30px; height: 30px; display: inline-flex; justify-content: center; align-items: center;">+</button>
                </div>
            
                <!-- Respondent Section -->
                <div style="flex: 1; margin-right: 0%; max-width: 400px;">
                    <label style="font-size: 20px; font-weight: 600;">Respondent 1</label>
                    <div id="respondent-container" style="display: flex; flex-direction: column; gap: 10px;">
                        <input type="text" name="respondent_name" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                        <input type="text" name="respondent_address" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                    </div>
                    <button type="button" onclick="addRespondent()" style="margin-top: 10px; font-size: 20px; background-color: #009717; color: #ffffff; border-radius: 50%; width: 30px; height: 30px; display: inline-flex; justify-content: center; align-items: center;">+</button>
                </div>
            </div>
            
            
            
    
            <!-- Complaint Category Dropdown -->
            <div style="margin-top: 300px; display: flex; justify-content: flex-start; margin-left: 0%;">
                <input type="hidden" name="complaint_category" id="hiddenCategory" value="">
                <button id="dropdowncategory" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; max-width: 400px; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;">
                    Case Type
                </button>
                <ul class="dropdown-menu" style="position: absolute; top: 100%; left: 0; width: 100%; max-width: 400px;">
                    <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Minor case</li>
                    <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Major case</li>
                </ul>
            </div>
    
            <!-- Complaint Description -->
            <div style= "margin-top: 300px; margin-bottom: 30px;">
                <label for="complaint-description">Ilagay ang iyong reklamo:</label>
                <textarea id="complaint-description" name="complaint_description" placeholder="Complaint description..." style="width: 100%; height: 300px; max-width: 1200px; border: 1px solid #b1b1b1; border-radius: 3px; padding: 15px; font-size: 1rem;"></textarea>
            </div>
    
            <!-- Place of Incident and Date/Time -->
            <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: -600px;">
                <div style="flex: 1; min-width: 280px; max-width: 400px;">
                    <label for="place-of-incident">Place of Incident:</label>
                    <input type="text" id="place-of-incident" name="place_of_incident" placeholder="Place of Incident..." style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 150px; ">
               <div style="min-width: 400px; max-width: 400px; position: relative; top: -220px; left: 550px; ">
                 <label for="incidence-date">Incident Date:</label>
               <input type="date" id="incidence-date" name="incidence_date" style=" width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
         </div>

        <div style="position: relative; top: -70px; min-width: 400px; max-width: 400px;">
           <label for="incidence-time">Incident Time:</label>
           <input type="time" id="incidence-time" name="incidence_time" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        </div>
       </div>

            
            
            
            
            
    
            <!-- Confirm Button -->
            <div style="margin-top: 600px; margin-left: 80%;">
            <button type="button" id="openModalButton" class="btn btn-primary" style="width: 100%; max-width: 300px; height: 60px; font-size: 1rem; font-weight: 600; margin: 0 auto; display: block;">Confirm</button>
    
            </div>

            <!-- Special Case Dropdown -->
            <div style="margin-top: -55px; display: flex; justify-content: flex-start; margin-left: 0%;">
                <input type="hidden" name="special_case" id="hiddenSpecialCase" value="">
                <button id="specialcasedrop" class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; max-width: 400px; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;">
                    Special Case Involved
                </button>
                <ul class="dropdown-menu" style="position: absolute; top: 100%; left: 0; width: 100%; max-width: 400px;">
                    <li type="button" onclick="updateButtonText('BCPC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BCPC</li>
                    <li type="button" onclick="updateButtonText('BADAC', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">BADAC</li>
                    <li type="button" onclick="updateButtonText('None', 'specialcasedrop', event)" class="dropdown-item" style="cursor: pointer;">None</li>
                </ul>
            </div>
    
    
        <div id="report-create" class="create">
    <div class="create-content">
        <span class="close-btn">&times;</span>
        <h1 style="position: absolute; left: 30%; top: 8%; font-size: 40px"  >COMPLAINT FILED</h1>
        <input type="text" name="case_number" placeholder="Case Number..." style="position: absolute; width: 600px; height: 55px; top: 45%;  left: 21%; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff; padding: 10px;">
        <button type="submit" id="submitbutton" class="btn btn-primary btn-hover" style="position: absolute; width: 300px; height: 60px; font-weight: 600; font-size: 20px; bottom: 40px; left: 34%;">Submit</button>
    </div>
</div>

    
    </form>

</div>

</section>

<section id="reportsection" style="display: none;">
<h1 style="position: absolute; left: 50%; top: 50%;">h11</h1>
</section>



    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- Sign Out Confirmation Modal -->
         <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
         data-bs-backdrop="static" data-bs-keyboard="false">
         <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered here -->
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="signOutModalLabel">Confirm Sign Out</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     Are you sure you want to sign out?
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-danger" id="confirmSignOutBtn" data-bs-dismiss="modal">Sign
                         Out</button>
                 </div>
             </div>
         </div>
     </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script>
        const sidebar = document.querySelector('.sidebar-content');
        const ps = new PerfectScrollbar(sidebar);

        function toggleSubmenu(element) {
            const submenu = element.nextElementSibling;
            const allSubmenus = document.querySelectorAll('.sidebar-submenu');
            const allHeaders = document.querySelectorAll('.sidebar-category-header');

            allSubmenus.forEach(menu => {
                if (menu !== submenu) {
                    menu.classList.remove('show');
                }
            });

            allHeaders.forEach(header => {
                if (header !== element) {
                    header.classList.remove('active');
                }
            });

            submenu.classList.toggle('show');
            element.classList.toggle('active');
            ps.update();
        }

        function createRipple(event) {
            const button = event.currentTarget;
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            ripple.classList.add('ripple');

            button.appendChild(ripple);

            ripple.addEventListener('animationend', () => {
                ripple.remove();
            });
        }

        document.querySelectorAll('.sidebar-submenu-item').forEach(item => {
            item.addEventListener('mouseenter', createRipple);
        });

            document.getElementById('confirmSignOutBtn').addEventListener('click', function () {
        // Redirect to signout.php to handle session destruction and redirection
        window.location.href = '../../../../../signout.php';
    });
    </script>

    <script src="dashboard.js"></script>

    <?php
 ?>
</body>

</html>






