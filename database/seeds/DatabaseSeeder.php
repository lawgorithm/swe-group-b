<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('CourseTableSeeder');
	//	$this->call('ApplicantTableSeeder');
	//	$this->call('ApplicantCourseTableSeeder');
        $this->call('InstructorTableSeeder');
	}
}

#Role(SSO, Role)
class RoleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->delete();

        App\Role::create(['sso' => 'masterhand', 'user_role' => 'admin']);
        App\Role::create(['sso' => 'cq9nj', 'user_role' => 'admin']);

        App\Role::create(['sso' => 'abc123', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'zyx987', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'fewft3', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'wer443', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'jfj675', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'lmwv2c', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'jn9qc', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'rmixv8', 'user_role' => 'applicant']);
	    App\Role::create(['sso' => 'jpvc4', 'user_role' => 'applicant']);
        App\Role::create(['sso' => 'bjt2p3', 'user_role' => 'applicant']);
	    App\Role::create(['sso' => 'bobros', 'user_role' => 'applicant']);
	    App\Role::create(['sso' => 'disney', 'user_role' => 'applicant']);
	    App\Role::create(['sso' => 'gwbush', 'user_role' => 'applicant']);
	    App\Role::create(['sso' => 'tal449', 'user_role' => 'applicant']);

        App\Role::create(['sso' => 'scottgs', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'klaricm', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'dickinsonm', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'guilliamsd', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'chadhar', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'jurczykm', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'wangf', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'saaby', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'zhaoy', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'harrisonw', 'user_role' => 'instructor']);
        App\Role::create(['sso' => 'springerg', 'user_role' => 'instructor']);
    }

}

#User(FullName, SSO, Email, Password)
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        //App\User::create(['name' => 'Master Hand', 'sso' => 'masterhand', 'email' => 'masterhand@missouri.edu', 'password' => Hash::make('secret')]);
        //App\User::create(['name' => 'CQ9NJ', 'sso' => 'cq9nj', 'cq9nj@missouri.edu', 'password' => Hash::make('secret')]);

        App\User::create(['name' => 'Lawrence Williams', 'sso' => 'lmwv2c', 'email' => 'lmwv2c@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Jackson Nowotny', 'sso' => 'jn9qc', 'email' => 'jn9qc@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Ryan Iffrig', 'sso' => 'rmixv8', 'email' => 'rmxiv8@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Master Hand', 'sso' => 'masterhand', 'email' => 'lawrencewilliams.lw@gmail.com', 'password' => Hash::make('iamthemaster')]);
        App\User::create(['name' => 'Jackson Nowotny', 'sso' => 'cq9nj', 'email' => 'ajnowotny@gmail.com', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Michael Jordan', 'sso' => 'wer443', 'email' => 'winning@basket.ball', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Jake Parham', 'sso' => 'jpvc4', 'email' => 'jpvc4@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Brendon Tiszka', 'sso' => 'bjt2p3', 'email' => 'bjt2p3@mail.missouri.edu', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'John Smith', 'sso' => 'abc123', 'email' => 'fake@fake.fake', 'password' => Hash::make('secret')]);
	    //App\User::create(['name' => 'Richard Nixon', 'sso' => 'zxy987', 'email' => 'jowels@president.fake', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Andrew Jackson', 'sso' => 'fewft3', 'email' => 'banks@president.fake', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Rene Magritte', 'sso' => 'jfj675', 'email' => 'paint@art.null', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Bob Ross', 'sso' => 'bobros', 'email' => 'paint@art.happylittletrees', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Walt Disney', 'sso' => 'disney', 'email' => 'mickey@mouse.disney', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Tim Laidlaw', 'sso' => 'tal449', 'email' => 'tal449@mail.missouri.edu', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'George W Bush', 'sso' => 'gwbush', 'email' => 'misunderestimate@president.fake', 'password' => Hash::make('secret')]);

        App\User::create(['name' => 'Grant Scott', 'sso' => 'scottgs', 'email' => 'scottgs@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Matthew Klaric', 'sso' => 'klaricm', 'email' => 'klaricm@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Matthew Dickinson', 'sso' => 'dickinsonm', 'email' => 'dickinsonm@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Donald Guilliams', 'sso' => 'guilliamsd', 'email' => 'guilliamsd@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Rohit Chadha', 'sso' => 'chadhar', 'email' => 'chadhar@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Michael Jurczyk', 'sso' => 'jurczykm', 'email' => 'jurczykm@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Fang Wang', 'sso' => 'wangf', 'email' => 'wangf@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Youssef Saab', 'sso' => 'saaby', 'email' => 'saaby@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Yunxin Zhao', 'sso' => 'zhaoy', 'email' => 'zhaoy@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Michael Harrison', 'sso' => 'harrisonw', 'email' => 'harrisonw@missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Gabalobababa Springer', 'sso' => 'springerg', 'email' => 'springerg@missouri.edu', 'password' => Hash::make('secret')]);
    }
}

#PasswordResets(Email, Token)
class PasswordResetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('password_resets')->delete();

        App\Password_Resets::create(['email' => 'masterhand@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'cq9nj@missouri.edu', 'token' => 'pass']);

        App\Password_Resets::create(['email' => 'lmwv2c@mail.missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'jn9qc@mail.missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'rmxiv8@mail.missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'lawrencewilliams.lw@gmail.com', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'ajnowotny@gmail.com', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'winning@basket.ball', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'jpvc4@mail.missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'bjt2p3@mail.missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'fake@fake.fake', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'jowels@president.fake', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'banks@president.fake', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'paint@art.null', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'paint@art.happylittletrees', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'mickey@mouse.disney', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'tal449@mail.missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'misunderestimate@president.fake', 'token' => 'pass']);
        
        App\Password_Resets::create(['email' => 'scottgs@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'klaricm@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'dickinsonm@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'guilliamsd@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'chadhar@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'jurczykm@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'wangf@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'saaby@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'zhaoy@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'harrisonw@missouri.edu', 'token' => 'pass']);
        App\Password_Resets::create(['email' => 'springerg@missouri.edu', 'token' => 'pass']);
    }
}

#TODO ADD REMAINING COURSES
#Course(CourseID, CourseName, Instructor)
class CourseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('course')->delete();

        App\Course::create(['courseid' => 'CS1050', 'coursename' => 'Algorithm Design and Programming I', 'instructor' => 'guilliamsd']);
        App\Course::create(['courseid' => 'CS2050', 'coursename' => 'Algorithm Design and Programming II', 'instructor' => 'guilliamsd']);
        App\Course::create(['courseid' => 'CS2270', 'coursename' => 'Introduction to Digital Logic', 'instructor' => 'wangf']);
        App\Course::create(['courseid' => 'CS3050', 'coursename' => 'Advanced Algorithm Design', 'instructor' => 'chadhar']);
        App\Course::create(['courseid' => 'CS3280', 'coursename' => 'Computer Organization and Assembly Language', 'instructor' => 'jurczykm']);
        App\Course::create(['courseid' => 'CS3330', 'coursename' => 'Object Oriented Programming', 'instructor' => 'guilliamsd']);
        App\Course::create(['courseid' => 'CS3380', 'coursename' => 'Database Applications and Information Systems', 'instructor' => 'klaricm']);
        App\Course::create(['courseid' => 'CS4050', 'coursename' => 'Design and Analysis of Algorithms', 'instructor' => 'saaby']);
        App\Course::create(['courseid' => 'CS4270', 'coursename' => 'Computer Architecture I', 'instructor' => 'zhaoy']);
        App\Course::create(['courseid' => 'CS4320', 'coursename' => 'Software Engineering I', 'instructor' => 'scottgs']);
        App\Course::create(['courseid' => 'CS4450', 'coursename' => 'Principles of Programming Language', 'instructor' => 'harrisonw']);
        App\Course::create(['courseid' => 'CS4520', 'coursename' => 'Operating Systems I', 'instructor' => 'springerg']);
    }
}

#Applicant(SSO, FullName, Phone, Email, GPA, GradDate, Program, WorkHistory, SpeechScore, SpeechDate)
class ApplicantTableSeeder extends Seeder
{
	public function run ()
	{
		DB::table('applicant')->delete();		
	
		App\Applicant::create(['sso' => 'wer443', 'name' => 'Michael Jordan', 'phone' => '1231231127', 'email' => 'winning@basket.ball', 'gpa' => '4.0', 'graddate' => 'S16', 'program' => 'CS BS fresh', 'previouswork' => 'Taco Bell', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'lmwv2c', 'name' => 'Lawrence Williams', 'phone' => '1234557878', 'email' => 'lawrencewilliams.lw@gmail.com', 'gpa' => '3.2', 'graddate' => 'S17', 'program' => 'IT BA soph', 'previouswork' => 'Strip Club', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'jn9qc', 'name' => 'Jackson Nowotny', 'phone' => '7774448787', 'email' => 'ajnowotny@gmail.com', 'gpa' => '2.9', 'graddate' => 'F16', 'program' => 'CS BS junior', 'previouswork' => 'Burger King', 'speakscore' => '2', 'speakdate' => '05/20/2016']);
		App\Applicant::create(['sso' => 'rmixv8', 'name' => 'Ryan Iffrig', 'phone' => '8988986655', 'email' => 'rmixv8@mail.missouri.edu', 'gpa' => '3.0', 'graddate' => 'F17', 'program' => 'IT BS senior', 'previouswork' => 'El Maquey', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'jpvc4', 'name' => 'Jake Parham', 'phone' => '1237895656', 'email' => 'jpvc4@mail.missouri.edu', 'gpa' => '1.9', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Panda Express', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'abc123', 'name' => 'John Smith', 'phone' => '5735551234', 'email' => 'fake@fake.fake', 'gpa' => '2.1', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Missing Person', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'zxy987', 'name' => 'Richard Nixon', 'phone' => '8085554321', 'email' => 'jowels@president.fake', 'gpa' => '2.2', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Wiretaps', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'fewft3', 'name' => 'Andrew Jackson', 'phone' => '5735558888', 'email' => 'banks@president.fake', 'gpa' => '2.3', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Politician', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'jfj675', 'name' => 'Rene Magritte', 'phone' => '1235551234', 'email' => 'paint@art.null', 'gpa' => '2.4', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Surrealism', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'bobros', 'name' => 'Bob Ross', 'phone' => '3145555555', 'email' => 'paint@art.happylittletrees', 'gpa' => '2.5', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Happy little trees', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'disney', 'name' => 'Walt Disney', 'phone' => '8125555555', 'email' => 'mickey@mouse.disney', 'gpa' => '2.6', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Animation', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'tal449', 'name' => 'Tim Laidlaw', 'phone' => '5735551956', 'email' => 'tal449@mail.missouri.edu', 'gpa' => '3.99', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'DoIT', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'gwbush', 'name' => 'George W Bush', 'phone' => '1235555555', 'email' => 'misunderestimate@president.fake', 'gpa' => '1.1', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Lived & Worked Washington DC', 'speakscore' => NULL, 'speakdate' => NULL]);
    }
	
}

#ApplicantCourse(SSO, CourseID, Action, Rank, Feedback)
class ApplicantCourseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('applicantcourse')->delete();


        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS1050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student never came to class but got good grades', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS1050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student would not stop talking during lecture', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS1050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was always in class and did great', 'recommendation' => 0]);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS1050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was annoying to the whole class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS1050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student never came to class but got good grades']);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS1050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student would not stop talking during lecture']);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS1050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was always in class and did great']);


        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS2050', 'action' => '001', 'rank' => NULL, 'feedback' => 'terrible student with no work ethic', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS2050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was caught cheating on homework', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS2050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was a delight to teach', 'recommendation' => 0]);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS2050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was a difficult to teach', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS2050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was never came to class', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS2270', 'action' => '100', 'rank' => NULL, 'feedback' => 'this student failed every test', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS2270', 'action' => '100', 'rank' => NULL, 'feedback' => 'student forgot about homeworks often', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS2270', 'action' => '010', 'rank' => NULL, 'feedback' => 'student got 100 in the class', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student dropped my class after a week', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3050', 'action' => '010', 'rank' => NULL, 'feedback' => 'student transferred to hogwarts', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS3050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was very easy to teach and learned quickly', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS3050', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was a cheater', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS3050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was a a compulsive liar', 'recommendation' => 0]);


        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3280', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was always early to class and ready to learn', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3280', 'action' => '010', 'rank' => NULL, 'feedback' => 'student was very attractive so I gave her an A', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS3280', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was always in class but very quiet', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3330', 'action' => '001', 'rank' => NULL, 'feedback' => 'student showed lack of effor all year', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS3330', 'action' => '010', 'rank' => NULL, 'feedback' => 'student was always eager to learn', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS3330', 'action' => '100', 'rank' => NULL, 'feedback' => 'great student with a drive for success', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3330', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was very selfish', 'recommendation' => 0]);


        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS3380', 'action' => '100', 'rank' => NULL, 'feedback' => 'student had major flatulence problems', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3380', 'action' => '001', 'rank' => NULL, 'feedback' => 'student had fantastic breasts', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS3380', 'action' => '010', 'rank' => NULL, 'feedback' => 'student showed up naked to class almost every day', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3380', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was a never to class on time', 'recommendation' => 0]);


        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4050', 'action' => '100', 'rank' => NULL, 'feedback' => 'awful student who cheats on tests', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student paid me to get good grades', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4050', 'action' => '010', 'rank' => NULL, 'feedback' => 'student paid attention but forgot about homework', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS4050', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was loud and annoying', 'recommendation' => 0]);


        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4270', 'action' => '001', 'rank' => NULL, 'feedback' => 'student got 100 in the class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS4270', 'action' => '010', 'rank' => NULL, 'feedback' => 'student showed little work ethic but was smart', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4270', 'action' => '001', 'rank' => NULL, 'feedback' => 'student never showed to class except tests', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4270', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was a delight to teach', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4270', 'action' => '100', 'rank' => NULL, 'feedback' => 'student never learned anything', 'recommendation' => 0]);


        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4320', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was obnoxious and loud', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4320', 'action' => '010', 'rank' => NULL, 'feedback' => 'student was very smart and polite always', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4320', 'action' => '100', 'rank' => NULL, 'feedback' => 'student drove a lamborghini', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4320', 'action' => '100', 'rank' => NULL, 'feedback' => 'student did not like the way I teach', 'recommendation' => 0]);


        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4450', 'action' => '001', 'rank' => NULL, 'feedback' => 'student never wore pants to class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4450', 'action' => '010', 'rank' => NULL, 'feedback' => 'student never wore shirts to class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS4450', 'action' => '001', 'rank' => NULL, 'feedback' => 'student wore only underwear to class', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4520', 'action' => '010', 'rank' => NULL, 'feedback' => 'student helped tutor in my office hours', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4520', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was always prepared for class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4520', 'action' => '010', 'rank' => NULL, 'feedback' => 'student didnt try as hard as he shouldh have', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4520', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was very disrespectful', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS4520', 'action' => '100', 'rank' => NULL, 'feedback' => 'student was awesome', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4520', 'action' => '010', 'rank' => NULL, 'feedback' => 'student helped tutor in my office hours']);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4520', 'action' => '001', 'rank' => NULL, 'feedback' => 'student was always prepared for class']);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4520', 'action' => '010', 'rank' => NULL, 'feedback' => 'student didnt try as hard as he shouldh have']);
    }
}

#NOT IN USE UNTIL OFFERS ARE MADE
#ApplicantOffer(SSO, CourseNo)
#Class ApplicantOfferTableSeeder extends Seeder{
#   public funciton run(){
#       App\Applicant_Offer::create(['sso' => 'wer443', 'courseid' => 'CS1050']);
#       App\Applicant_Offer::create(['sso' => 'jfj675', 'courseid' => 'CS2050']);
#       App\Applicant_Offer::create(['sso' => 'abc123', 'courseid' => 'CS3050']);
#       App\Applicant_Offer::create(['sso' => 'fewft3', 'courseid' => 'CS4320']);
#   }
#}


#Instructor(SSO, FullName)
Class InstructorTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('instructor')->delete();
        
        App\Instructor::create(['sso' => 'scottgs', 'name' => 'Grant Scott']);
        App\Instructor::create(['sso' => 'klaricm', 'name' => 'Matthew Klaric']);
        App\Instructor::create(['sso' => 'dickinsonm', 'name' => 'Matthew Dickinson']);
        App\Instructor::create(['sso' => 'guilliamsd', 'name' => 'Donald Guilliams']);
        App\Instructor::create(['sso' => 'chadhar', 'name' => 'Rohit Chadha']);
        App\Instructor::create(['sso' => 'jurczykm', 'name' => 'Michael Jurczyk']);
        App\Instructor::create(['sso' => 'wangf', 'name' => 'Fang Wang']);
        App\Instructor::create(['sso' => 'saaby', 'name' => 'Youssef Saab']);
        App\Instructor::create(['sso' => 'zhaoy', 'name' => 'Yunxin Zhao']);
        App\Instructor::create(['sso' => 'harrisonw', 'name' => 'Michael Harrison']);
        App\Instructor::create(['sso' => 'springerg', 'name' => 'Gabalobababa Springer']);
    }
}
