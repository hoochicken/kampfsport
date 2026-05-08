function calculate()
{
	// basic data
  let p1Weight = $('#partner1Weight').val();
  let p1Height = getMFromCm($('#partner1Height').val());
  let p2Weight = $('#partner2Weight').val();
  let p2Height = getMFromCm($('#partner2Height').val());

  // calculation: basic data + bmi
  let p1WeightQuotientOriginal = calculateQuotient(p1Weight, p2Weight).toFixed(2);
  let p1HeightQuotientOriginal = calculateQuotient(p1Height, p2Height).toFixed(2);
  let p2WeightQuotientOriginal = calculateQuotient(p2Weight, p1Weight).toFixed(2);
  let p2HeightQuotientOriginal = calculateQuotient(p2Height, p1Height).toFixed(2);
  let p1Bmi = calculateBMI(p1Weight, p1Height);
  let p2Bmi = calculateBMI(p2Weight, p2Height);

  // reverse
  let p1WeightReverse = (p1Weight * p1WeightQuotientOriginal).toFixed(2);
  let p1HeightReverse = (p1Height * p1HeightQuotientOriginal).toFixed(2);
  let p2WeightReverse = (p2Weight * p2WeightQuotientOriginal).toFixed(2);
  let p2HeightReverse = (p2Height * p2HeightQuotientOriginal).toFixed(2);

  // output original
  $('.partner1.original.weight-quotient').html(p1WeightQuotientOriginal);
  $('.partner1.original.height-quotient').html(p1HeightQuotientOriginal);
  $('.partner1.original.bmi').html(p1Bmi.toFixed(2));

  $('.partner2.original.weight-quotient').html(p2WeightQuotientOriginal);
  $('.partner2.original.height-quotient').html(p2HeightQuotientOriginal);
  $('.partner2.original.bmi').html(p2Bmi.toFixed(2));

  // output reverse
  $('.partner1.reverse.weight').html(p1WeightReverse);
  $('.partner1.reverse.height').html(p1HeightReverse);
  $('.partner2.reverse.weight').html(p2WeightReverse);
  $('.partner2.reverse.height').html(p2HeightReverse);

  $('#fazit-box').css('display', 'block');
}

function calculateQuotient(a, b)
{
	return a / b;
}

function getMFromCm(length)
{
	return length / 100;
}

function calculateBMI(weightKG, heightM)
{
	// Körpergewicht (in kg ) geteilt durch Körpergröße (in m ) zum Quadrat
  return weightKG / (heightM * heightM);
}
