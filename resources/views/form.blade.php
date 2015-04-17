@extends('app')

@section('headers')
<link href="/css/form.css" rel="stylesheet" />
@endsection

@section('content')
<form id="msForm" action="/" method="POST">
  <fieldset id="fs1">
    <div class="form-group">
      <label for="studentName">Full Name</label>
      <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Brendon Tiszka">

      <label for="studentPhone">Phone Number</label>
      <input type="text" class="form-control" id="studentPhone" name="studentPhone" placeholder="(816) 555-3272">

      <label for="studentId">Student Id</label>
      <input type="text" class="form-control" id="studentId" name="studentId" placeholder="1603133769">

      <label for="studentEmail">Student Email</label>
      <input type="text" class="form-control" id="studentEmail" name="studentEmail" placeholder="bjt5n5@mail.missouri.edu">

      <div class="form-inline" style="margin-top: 11px;">
        <select class="form-control" name="studentStatus">
          <option value="Und">Undergraduate</option>
          <option value="Gra">Graduate</option>
        </select>

        <label for="studentGPA">Grade Point Average</label>
        <input type="text" class="form-control" id="studentGPA" placeholder="3.14">
      </div>
      <div class="submit-button">
        <button id="next1" class="btn btn-primary" style="float: right;">Next</button>
      </div>
    </div>
  </fieldset>
  
  <fieldset id="fs2">
    <div class="form-group">
      <label for="pal">Program and Level</label>
      <input type="text" class="form-control" id="studentId" name="studentId" placeholder="CS BA jr">

      <label for="work">*Other places you work</label>
      <input type="text" class="form-control" id="work" name="studentWork" placeholder="Google, Apple, Taco Bell">
            
      <div class="form-inline">
        <label for="opt">*SPEAK/OPT score</label>
        <input type="text" class="form-control" style="width: 80px; margin-right: 20px;" id="opt" name="studentOpt" placeholder="4">

        <label for="prevTaught">Semester of last test</label>
        <select class="form-control" name="studentTaught">
          <option value="F14">Fall 2014</option>
          <option value="S14">Spring 2014</option>
        </select>
      </div>


      <label for="studentGday">Graduation Date</label>
      <input type="date" name="gradDate"/>
      
      <div class="submit-button">
        <button class="btn btn-primary" id="prev1">Previous</button>
        <button class="btn btn-primary" style="float: right;" id="next2">Next</button>
      </div>
    </div>
  </fieldset>

  <fieldset id="fs3">
    <div class="form-group">
      <label for="prevTaught">*Previously taught</label>
      <div class="form-inline">
        <select class="form-control" name="prevTaught">
          <option value="1000">1000</option>
          <option value="1001">1001</option>
          <option value="1040">1040</option>
          <option value="1050">1050</option>
          <option value="2001">2001</option>
          <option value="2050">2050</option>
          <option value="2111">2111</option>
          <option value="2270">2270</option>
          <option value="2830">2830</option>
          <option value="3001">3001</option>
          <option value="3050">3050</option>
          <option value="3280">3280</option>
          <option value="3330">3330</option>
          <option value="3380">3380</option>
          <option value="3530">3530</option>
          <option value="3940">3940</option>
          <option value="4001">4001</option>
          <option value="4050">4050</option>
          <option value="4060">4060</option>
          <option value="4070">4070</option>
          <option value="4085">4085</option>
          <option value="4270">4270</option>
          <option value="4280">4280</option>
          <option value="4320">4320</option>
          <option value="4330">4330</option>
          <option value="4380">4380</option>
          <option value="4410">4410</option>
          <option value="4430">4430</option>
          <option value="4440">4440</option>
          <option value="4450">4450</option>
          <option value="4520">4520</option>
          <option value="4610">4610</option>
          <option value="4620">4620</option>
          <option value="4650">4650</option>
          <option value="4670">4670</option>
          <option value="4720">4720</option>
          <option value="4730">4730</option>
          <option value="4740">4740</option>
          <option value="4750">4750</option>
          <option value="4770">4770</option>
          <option value="4830">4830</option>
          <option value="4850">4850</option>
          <option value="4860">4860</option>
          <option value="4870">4870</option>
          <option value="4970">4970</option>
          <option value="4980">4980</option>
          <option value="4990">4990</option>
          <option value="4995">4995</option>
          <option value="7001">7001</option>
          <option value="7010">7010</option>
          <option value="7050">7050</option>
          <option value="7060">7060</option>
          <option value="7070">7070</option>
          <option value="7087">7087</option>
          <option value="7270">7270</option>
          <option value="7280">7280</option>
          <option value="7320">7320</option>
          <option value="7380">7380</option>
          <option value="7410">7410</option>
          <option value="7430">7430</option>
          <option value="7450">7450</option>
          <option value="7520">7520</option>
          <option value="7610">7610</option>
          <option value="7620">7620</option>
          <option value="7650">7650</option>
          <option value="7670">7670</option>
          <option value="7720">7720</option>
          <option value="7730">7730</option>
          <option value="7740">7740</option>
          <option value="7750">7750</option>
          <option value="7770">7770</option>
          <option value="7830">7830</option>
          <option value="7850">7850</option>
          <option value="7860">7860</option>
          <option value="7870">7870</option>
          <option value="8001">8001</option>
          <option value="8050">8050</option>
          <option value="8060">8060</option>
          <option value="8085">8085</option>
          <option value="8090">8090</option>
          <option value="8110">8110</option>
          <option value="8120">8120</option>
          <option value="8130">8130</option>
          <option value="8150">8150</option>
          <option value="8160">8160</option>
          <option value="8180">8180</option>
          <option value="8190">8190</option>
          <option value="8270">8270</option>
          <option value="8320">8320</option>
          <option value="8330">8330</option>
          <option value="8370">8370</option>
          <option value="8380">8380</option>
          <option value="8390">8390</option>
          <option value="8410">8410</option>
          <option value="8430">8430</option>
          <option value="8440">8440</option>
          <option value="8520">8520</option>
          <option value="8610">8610</option>
          <option value="8620">8620</option>
          <option value="8630">8630</option>
          <option value="8650">8650</option>
          <option value="8660">8660</option>
          <option value="8670">8670</option>
          <option value="8690">8690</option>
          <option value="8725">8725</option>
          <option value="8735">8735</option>
          <option value="8750">8750</option>
          <option value="8760">8760</option>
          <option value="8770">8770</option>
          <option value="8790">8790</option>
          <option value="8850">8850</option>
          <option value="8860">8860</option>
          <option value="8870">8870</option>
          <option value="8880">8880</option>
          <option value="8980">8980</option>
          <option value="8990">8990</option>
          <option value="9001">9001</option>
          <option value="9990">9990</option>
        </select>
      </div>

      <label for="currTaught">*Currently teaching</label>
      <div class="form-inline">
        <select class="form-control" name="currTaught">
          <option value="1000">1000</option>
          <option value="1001">1001</option>
          <option value="1040">1040</option>
          <option value="1050">1050</option>
          <option value="2001">2001</option>
          <option value="2050">2050</option>
          <option value="2111">2111</option>
          <option value="2270">2270</option>
          <option value="2830">2830</option>
          <option value="3001">3001</option>
          <option value="3050">3050</option>
          <option value="3280">3280</option>
          <option value="3330">3330</option>
          <option value="3380">3380</option>
          <option value="3530">3530</option>
          <option value="3940">3940</option>
          <option value="4001">4001</option>
          <option value="4050">4050</option>
          <option value="4060">4060</option>
          <option value="4070">4070</option>
          <option value="4085">4085</option>
          <option value="4270">4270</option>
          <option value="4280">4280</option>
          <option value="4320">4320</option>
          <option value="4330">4330</option>
          <option value="4380">4380</option>
          <option value="4410">4410</option>
          <option value="4430">4430</option>
          <option value="4440">4440</option>
          <option value="4450">4450</option>
          <option value="4520">4520</option>
          <option value="4610">4610</option>
          <option value="4620">4620</option>
          <option value="4650">4650</option>
          <option value="4670">4670</option>
          <option value="4720">4720</option>
          <option value="4730">4730</option>
          <option value="4740">4740</option>
          <option value="4750">4750</option>
          <option value="4770">4770</option>
          <option value="4830">4830</option>
          <option value="4850">4850</option>
          <option value="4860">4860</option>
          <option value="4870">4870</option>
          <option value="4970">4970</option>
          <option value="4980">4980</option>
          <option value="4990">4990</option>
          <option value="4995">4995</option>
          <option value="7001">7001</option>
          <option value="7010">7010</option>
          <option value="7050">7050</option>
          <option value="7060">7060</option>
          <option value="7070">7070</option>
          <option value="7087">7087</option>
          <option value="7270">7270</option>
          <option value="7280">7280</option>
          <option value="7320">7320</option>
          <option value="7380">7380</option>
          <option value="7410">7410</option>
          <option value="7430">7430</option>
          <option value="7450">7450</option>
          <option value="7520">7520</option>
          <option value="7610">7610</option>
          <option value="7620">7620</option>
          <option value="7650">7650</option>
          <option value="7670">7670</option>
          <option value="7720">7720</option>
          <option value="7730">7730</option>
          <option value="7740">7740</option>
          <option value="7750">7750</option>
          <option value="7770">7770</option>
          <option value="7830">7830</option>
          <option value="7850">7850</option>
          <option value="7860">7860</option>
          <option value="7870">7870</option>
          <option value="8001">8001</option>
          <option value="8050">8050</option>
          <option value="8060">8060</option>
          <option value="8085">8085</option>
          <option value="8090">8090</option>
          <option value="8110">8110</option>
          <option value="8120">8120</option>
          <option value="8130">8130</option>
          <option value="8150">8150</option>
          <option value="8160">8160</option>
          <option value="8180">8180</option>
          <option value="8190">8190</option>
          <option value="8270">8270</option>
          <option value="8320">8320</option>
          <option value="8330">8330</option>
          <option value="8370">8370</option>
          <option value="8380">8380</option>
          <option value="8390">8390</option>
          <option value="8410">8410</option>
          <option value="8430">8430</option>
          <option value="8440">8440</option>
          <option value="8520">8520</option>
          <option value="8610">8610</option>
          <option value="8620">8620</option>
          <option value="8630">8630</option>
          <option value="8650">8650</option>
          <option value="8660">8660</option>
          <option value="8670">8670</option>
          <option value="8690">8690</option>
          <option value="8725">8725</option>
          <option value="8735">8735</option>
          <option value="8750">8750</option>
          <option value="8760">8760</option>
          <option value="8770">8770</option>
          <option value="8790">8790</option>
          <option value="8850">8850</option>
          <option value="8860">8860</option>
          <option value="8870">8870</option>
          <option value="8880">8880</option>
          <option value="8980">8980</option>
          <option value="8990">8990</option>
          <option value="9001">9001</option>
          <option value="9990">9990</option>
        </select>
      </div>

      <label for="likeTeach">Would like to teach</label>
      <div class="form-inline">
        <select class="form-control" name="likeTeach">
          <option value="1040">1040</option>
          <option value="1050">1050</option>
        </select>
      </div>
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="submit-button">
        <button class="btn btn-primary" id="prev2">Previous</button>
        <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
@endsection

@section('scripts')
<script src="/js/form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
