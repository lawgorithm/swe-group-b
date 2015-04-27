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
		//$this->call('ApplicantCourseTableSeeder'); 
	}

}

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

class ApplicantCourseTableSeeder extends Seeder {

	public function run()
	{
		DB::table('applicantcourse')->delete();
		
		
		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '1050', 'action' => '100', 'rank' => '2', 'feedback' => 'student never came to class but got good grades']);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => '1050', 'action' => '001', 'rank' => '3', 'feedback' => 'student would not stop talking during lecture']);
		App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => '1050', 'action' => '100', 'rank' => '1', 'feedback' => 'student was always in class and did great']);
		
		App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => '2050', 'action' => '001', 'rank' => '2', 'feedback' => 'terrible student with no work ethic']);
		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '2050', 'action' => '001', 'rank' => '3', 'feedback' => 'student was caught cheating on homework']);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '2050', 'action' => '001', 'rank' => '1', 'feedback' => 'student was a delight to teach']);

		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '2270', 'action' => '100', 'rank' => '3', 'feedback' => 'this student failed every test']);
		App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => '2270', 'action' => '100', 'rank' => '2', 'feedback' => 'student forgot about homeworks often']);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '2270', 'action' => '010', 'rank' => '1', 'feedback' => 'student got 100 in the class']);

		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '3050', 'action' => '001', 'rank' => '3', 'feedback' => 'student dropped my class after a week']);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '3050', 'action' => '010', 'rank' => '2', 'feedback' => 'student transferred to hogwarts']);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => '3050', 'action' => '100', 'rank' => '1', 'feedback' => 'student was very easy to teach and learned quickly']);

		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '3280', 'action' => '001', 'rank' => '2', 'feedback' => 'student was always early to class and ready to learn']);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '3280', 'action' => '010', 'rank' => '1', 'feedback' => 'student was very attractive so I gave her an A']);
		App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => '3280', 'action' => '100', 'rank' => '3', 'feedback' => 'student was always in class but very quiet']);

		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '3330', 'action' => '001', 'rank' => '3', 'feedback' => 'student showed lack of effor all year']);
		App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => '3330', 'action' => '010', 'rank' => '2', 'feedback' => 'student was always eager to learn']);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => '3330', 'action' => '100', 'rank' => '1', 'feedback' => 'great student with a drive for success']);

		App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => '3380', 'action' => '100', 'rank' => '3', 'feedback' => 'student had major flatulence problems']);
		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '3380', 'action' => '001', 'rank' => '1', 'feedback' => 'student had fantastic breasts']);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => '3380', 'action' => '010', 'rank' => '2', 'feedback' => 'student showed up naked to class almost every day']);

		App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => '4050', 'action' => '100', 'rank' => '3', 'feedback' => 'awful student who cheats on tests']);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '4050', 'action' => '001', 'rank' => '1', 'feedback' => 'student paid me to get good grades']);
		App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => '4050', 'action' => '010', 'rank' => '2', 'feedback' => 'student paid attention but forgot about homework']);

		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '4270', 'action' => '001', 'rank' => '1', 'feedback' => 'student got 100 in the class']);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => '4270', 'action' => '010', 'rank' => '2', 'feedback' => 'student showed little work ethic but was smart']);
		App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => '4270', 'action' => '001', 'rank' => '3', 'feedback' => 'student never showed to class except tests']);

		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '4320', 'action' => '001', 'rank' => '3', 'feedback' => 'student was obnoxious and loud']);
		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '4320', 'action' => '010', 'rank' => '2', 'feedback' => 'student was very smart and polite always']);
		App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => '4320', 'action' => '100', 'rank' => '1', 'feedback' => 'student drove a lamborghini']);
		
		App\Applicant_Course::create(['sso' => 'jn9qc', 'courseid' => '4450', 'action' => '001', 'rank' => '3', 'feedback' => 'student never wore pants to class']);
		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '4450', 'action' => '010', 'rank' => '2', 'feedback' => 'student never wore shirts to class']);
		App\Applicant_Course::create(['sso' => 'wer443', 'courseid' => '4450', 'action' => '001', 'rank' => '1', 'feedback' => 'student wore only underwear to class']);

		App\Applicant_Course::create(['sso' => 'rmixv8', 'courseid' => '4520', 'action' => '010', 'rank' => '1', 'feedback' => 'student helped tutor in my office hours']);
		App\Applicant_Course::create(['sso' => 'jpvc4', 'courseid' => '4520', 'action' => '001', 'rank' => '2', 'feedback' => 'student was always prepared for class']);
		App\Applicant_Course::create(['sso' => 'lmwv2c', 'courseid' => '4520', 'action' => '010', 'rank' => '3', 'feedback' => 'student didnt try as hard as he shouldh have']);
		
	}

}
