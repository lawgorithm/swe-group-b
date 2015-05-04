@extends('admin/admin')

@section('headers')
    <link href="/css/about.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('content')
    <div class="container">
        <h1>About Mizzou TA Application Website</h1>
        <p id="intro">Welcome to the about page. Here you will find information about the site and how it works.</p>
        <p></p>
        <h2>Core Concepts</h2>
        <div class="stuff stuff_left">
            <h3>Roles</h3>
            <p>The first important thing to know about how this site operates is the concept of roles which
               pertains to the rights and functions for different types of users.</p>
            <p>All functionalities are split into three roles: applicant, instructor, and admin.</p>
            <p>Applicants can apply to positions, view application status, and accept/decline offers.
               Instructors can create, edit, and delete feedback for applicants for their courses.
               Admins can rank applicants for each course and send email offers to applicants. The admins
               can also set the temporal windows.</p>
            <p>Checks are set to disallow all users from accessing content that does not apply to their corresponding role.</p>

            <h3>Authentication</h3>
            <p>Authentication provides security and control over content of the site.</p>
            <p>All guests are required to login upon entering the site and can only view the welcome page.</p>
            <p>All users have been preset and therefore registration is disabled.</p>
            <p>The login functionality is the same for users of all roles. Upon logging in the role of the user is detect
               and the site responds appropriately.</p>
            <p>Checks are set to enforce authentication on all sites except the welcome page. This restricts access
               to all such sites unless logged in.</p>
        </div>
        <div class="stuff stuff_right">
            <h3>Time Windows</h3>
            <p>A huge part of the flow of the website revolves around time windows.
                Time windows are successive sets of times that control access, functions, and content.</p>
            <p>The site is split into three time windows: application window, feedback window, and the rank window.</p>
            <p>During the first window, the application window, applicants are allowed to apply for positions. Feedback and rank
               functionalities are disabled during the first window. During the second window, the feedback window, instructors are allowed to give feedback
               for applicants. Applications and rank functionalities are disabled during the second window. During the third
               and final window, the rank window, admins are allowed to rank and give offers to applicants. Applications
               and feedback functionalities are disable during the third window.</p>
            <p>Checks are set to disallow all users from accessing content and functions that are not active during the
               current time window.</p>
            <p>Text on home screens are adjusted based on the current time window to give appropriate messages.</p>
            <p>The admin can set and change all time windows in the settings page.</p>
            <p>There is a fourth scenario as far as functionalities are concerned. This is when no times are set. This
               is the case the first time the site is accessed by the admin. Once the initial time is set, there will
               always be a set time.</p>
        </div>
        <h2>Functionalities</h2>
        <div class="stuff stuff_left">
            <h3>Applications</h3>
            <p>Users with the role of the applicant have a primary functionality of applying for positions. Applicant's prime
               time window is the application window.</p>
            <p>The application is accessible through the navigation bar and is only allowed to applicants during the application
               window.</p>
            <p>Applicants can apply one time to multiple positions. Checks are setup to disable multiple applications.</p>
            <p>Messages on the homescreen change based on application submission status and offer status.</p>
            <p>Applicants can accept or deny any offers received.</p>
            <h3>Time Setting</h3>
            <p>Admins have the ability to set the three times corresponding to the start and ends of time windows.</p>
            <p>Time setting functionality is available during all time windows.</p>
            <p>The admin is notified of current time windows on time setting site.</p>
            <h3>Offers</h3>
            <p>Admins have the functionality of sending offers to applicants.</p>
            <p>Offers to applicants are sent via provided email with a link to accept or deny.</p>
            <p>Offer functionality is available during the rank time window.</p>
            <p>Admin manually selects applicants to send offers to from list of top ranked students ordered by rank for
                each course.</p>
            <p>Admin is notified of applicants already sent offers to.</p>
        </div>
        <div class="stuff stuff_right">
            <h3>Feedback</h3>
            <p>Users with the role of the instructor have a primary functionality of giving feedback to applicants. Instructor's
                prime time window is the feedback window.</p>
            <p>The feedback page is accessible through the navigation bar and is only allowed to instructors during the
                feedback window.</p>
            <p>Instructors can give, edit, and delete feedback any time during the feedback window.</p>
            <p>Instructors can only give feedback to applicants applying for classes taught by that instructor.</p>
            <p>The instructor can view application information of each applicant applying for course taught.</p>
            <p>The instructor is notified of applicants already given feedback to.</p>
            <h3>Ranking</h3>
            <p>Users with the role of the admin have primary functionalities of ranking applicants.
                Admin's prime time window is the rank window.</p>
            <p>The ranking process is accessible through the navigation bar and is only allowed to admins during the rank window.</p>
            <p>Admins can edit rank for each course at any point during the rank window.</p>
            <p>Once the rank for a particular course has been submitted, it is no longer accessible or editable.</p>
            <p>Admins can view courses already submitted ranking for and courses yet to have rank submitted.</p>
            <p>Admins can view application and feedback information for each applicant.</p>
        </div>
    </div>
@endsection