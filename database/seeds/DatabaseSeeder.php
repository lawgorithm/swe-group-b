<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

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
		$this->call('ApplicantTableSeeder');
		$this->call('ApplicantCourseTableSeeder');
        $this->call('InstructorTableSeeder');
	}

}

#Role(SSO, Role)
class RoleTableSeeder extends Seeder {

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

        App\User::create(['name' => 'Lawrence Williams', 'sso' => 'lmwv2c', 'email' => 'lmwv2c@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Jackson Nowotny', 'sso' => 'jn9qc', 'email' => 'jn9qc@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Ryan Iffrig', 'sso' => 'rmixv8', 'email' => 'rmxiv8@mail.missouri.edu', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Master Hand', 'sso' => 'masterhand', 'email' => 'lawrencewilliams.lw@gmail.com', 'password' => Hash::make('iamthemaster')]);
        App\User::create(['name' => 'Jackson Nowotny', 'sso' => 'cq9nj', 'email' => 'ajnowotny@gmail.com', 'password' => Hash::make('secret')]);
        App\User::create(['name' => 'Michael Jordan', 'sso' => 'wer443', 'email' => 'winning@basket.ball', 'password' => Hash::make('secret')]);
	    App\User::create(['name' => 'Jake Parham', 'sso' => 'jpvc4', 'email' => 'jpvc4@mail.missouri.edu', 'password' => Hash::make('secret')]);
    }
}

#Course(CourseID, CourseName, Instructor)
class CourseTableSeeder extends Seeder {

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
class ApplicantTableSeeder extends Seeder {

	public function run ()
	{
		DB::table('applicant')->delete();
		
	
		App\Applicant::create(['sso' => 'wer443', 'name' => 'Michael Jordan', 'phone' => '1231231127', 'email' => 'winning@basket.ball', 'gpa' => '4.0', 'graddate' => 'S16', 'program' => 'CS BS fresh', 'previouswork' => 'Taco Bell', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'lmwv2c', 'name' => 'Lawrence Williams', 'phone' => '1234557878', 'email' => 'lawrencewilliams.lw@gmail.com', 'gpa' => '3.2', 'graddate' => 'S17', 'program' => 'IT BA soph', 'previouswork' => 'Strip Club', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'jn9qc', 'name' => 'Jackson Nowotny', 'phone' => '7774448787', 'email' => 'ajnowotny@gmail.com', 'gpa' => '2.9', 'graddate' => 'F16', 'program' => 'CS BS junior', 'previouswork' => 'Burger King', 'speakscore' => '2', 'speakdate' => '05/20/2016']);
		App\Applicant::create(['sso' => 'rmixv8', 'name' => 'Ryan Iffrig', 'phone' => '8988986655', 'email' => 'rmixv8@mail.missouri.edu', 'gpa' => '3.0', 'graddate' => 'F17', 'program' => 'IT BS senior', 'previouswork' => 'El Maquey', 'speakscore' => NULL, 'speakdate' => NULL]);
		App\Applicant::create(['sso' => 'jpvc4', 'name' => 'Jake Parham', 'phone' => '1237895656', 'email' => 'jpvc4@mail.missouri.edu', 'gpa' => '1.9', 'graddate' => 'S15', 'program' => 'CS BS senior', 'previouswork' => 'Panda Express', 'speakscore' => NULL, 'speakdate' => NULL]);
	}
	
}

#ApplicantCourse(SSO, CourseID, Action, Rank, Feedback)
class ApplicantCourseTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('applicantcourse')->delete();


        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS1050', 'action' => '100', 'rank' => '2', 'feedback' => 'student never came to class but got good grades', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS1050', 'action' => '001', 'rank' => '3', 'feedback' => 'student would not stop talking during lecture', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS1050', 'action' => '100', 'rank' => '1', 'feedback' => 'student was always in class and did great', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS2050', 'action' => '001', 'rank' => '2', 'feedback' => 'terrible student with no work ethic', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS2050', 'action' => '001', 'rank' => '3', 'feedback' => 'student was caught cheating on homework', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS2050', 'action' => '001', 'rank' => '1', 'feedback' => 'student was a delight to teach', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS2270', 'action' => '100', 'rank' => '3', 'feedback' => 'this student failed every test', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS2270', 'action' => '100', 'rank' => '2', 'feedback' => 'student forgot about homeworks often', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS2270', 'action' => '010', 'rank' => '1', 'feedback' => 'student got 100 in the class', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3050', 'action' => '001', 'rank' => '3', 'feedback' => 'student dropped my class after a week', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3050', 'action' => '010', 'rank' => '2', 'feedback' => 'student transferred to hogwarts', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS3050', 'action' => '100', 'rank' => '1', 'feedback' => 'student was very easy to teach and learned quickly', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3280', 'action' => '001', 'rank' => '2', 'feedback' => 'student was always early to class and ready to learn', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3280', 'action' => '010', 'rank' => '1', 'feedback' => 'student was very attractive so I gave her an A', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS3280', 'action' => '100', 'rank' => '3', 'feedback' => 'student was always in class but very quiet', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS3330', 'action' => '001', 'rank' => '3', 'feedback' => 'student showed lack of effor all year', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS3330', 'action' => '010', 'rank' => '2', 'feedback' => 'student was always eager to learn', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS3330', 'action' => '100', 'rank' => '1', 'feedback' => 'great student with a drive for success', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS3380', 'action' => '100', 'rank' => '3', 'feedback' => 'student had major flatulence problems', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS3380', 'action' => '001', 'rank' => '1', 'feedback' => 'student had fantastic breasts', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS3380', 'action' => '010', 'rank' => '2', 'feedback' => 'student showed up naked to class almost every day', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4050', 'action' => '100', 'rank' => '3', 'feedback' => 'awful student who cheats on tests', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4050', 'action' => '001', 'rank' => '1', 'feedback' => 'student paid me to get good grades', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4050', 'action' => '010', 'rank' => '2', 'feedback' => 'student paid attention but forgot about homework', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4270', 'action' => '001', 'rank' => '1', 'feedback' => 'student got 100 in the class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS4270', 'action' => '010', 'rank' => '2', 'feedback' => 'student showed little work ethic but was smart', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4270', 'action' => '001', 'rank' => '3', 'feedback' => 'student never showed to class except tests', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4320', 'action' => '001', 'rank' => '3', 'feedback' => 'student was obnoxious and loud', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4320', 'action' => '010', 'rank' => '2', 'feedback' => 'student was very smart and polite always', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4320', 'action' => '100', 'rank' => '1', 'feedback' => 'student drove a lamborghini', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => 'CS4450', 'action' => '001', 'rank' => '3', 'feedback' => 'student never wore pants to class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4450', 'action' => '010', 'rank' => '2', 'feedback' => 'student never wore shirts to class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => 'CS4450', 'action' => '001', 'rank' => '1', 'feedback' => 'student wore only underwear to class', 'recommendation' => 0]);

        App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => 'CS4520', 'action' => '010', 'rank' => '1', 'feedback' => 'student helped tutor in my office hours', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => 'CS4520', 'action' => '001', 'rank' => '2', 'feedback' => 'student was always prepared for class', 'recommendation' => 0]);
        App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => 'CS4520', 'action' => '010', 'rank' => '3', 'feedback' => 'student didnt try as hard as he shouldh have', 'recommendation' => 0]);

    }
}

#Instructor(SSO, FullName)
Class InstructorTableSeeder extends Seeder{

    public function run(){
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
