(function() 
 {
  var allQuestions = [{
    question: "A call center is______",
    options: ["A meeting place for DCAs", "A training center for DSAs", "A meeting center place for customers s", "A back office setup where customer queries are answered"],
    answer: 3
  }, {
    question: "The sequence of a sales process is________",
    options: ["Lead generation, call presentation and sale", "Sale, presentation, lead generation, sale and call", "Presentation, lead generation, sale and call", "There is no sequence required"],
    answer: 0
  }, {
    question: "‘Value-added services’ means_________",
    options: ["Better value at a premium", "Costlier services", "Additional services","Better value at a discount"],
    answer: 2
  },{
    question: "WTo ‘Close a Call’ means_______",
    options: ["To end the conversation", "To put the phone down", "To close the door", "To clinch the sale"],
    answer: 3
  }, {
    question: "‘Customization’ means_______",
    options: ["Integration", "Customers selling goods", "None of these", "Tailor-made products for each customer"],
    answer: 0
  },{
    question: "A ‘Call’ in marketing language means_________",
    options: ["Calling on a sales person", "Calling on a customer", "Making a phone-call", "Tele-marketing"],
    answer: 1
  },{
    question: "Computers manipulate data in many ways, and this manipulation is called",
    options: ["Upgrading", "Processing", "Batching", "Utilizing"],
    answer: 0
  },{
    question: "A market survey is required for________",
    options: ["Deciding marketing strategies", "Deciding product strategies", "None of these", "Deciding pricing strategies"],
    answer: 2
  },{
    question: "The Target Group for Education Loan is________",
    options: ["All colleges", "All parents", "All of these", "Meritorious students seeking higher education"],
    answer: 2
  },{
    question: "Cross-selling means_______",
    options: [" Selling with a cross face", " Selling to friends", "Selling other products to existing customers", "Selling to friends"],
    answer: 2
    }];
  
  var quesCounter = 0;
  var selectOptions = [];
  var quizSpace = $('#marketing');
    
  nextQuestion();
    
  $('#next').click(function () 
    {
        chooseOption();
        if (isNaN(selectOptions[quesCounter])) 
        {
            alert('Please select an option !');
        } 
        else 
        {
          quesCounter++;
          nextQuestion();
        }
    });
  
  $('#prev').click(function () 
    {
        chooseOption();
        quesCounter--;
        nextQuestion();
    });
  
  function createElement(index) 
    {
        var element = $('<div>',{id: 'question'});
        var header = $('<h2>Question No. ' + (index + 1) + ' :</h2>');
        element.append(header);

        var question = $('<p>').append(allQuestions[index].question);
        element.append(question);

        var radio = radioButtons(index);
        element.append(radio);

        return element;
    }
  
  function radioButtons(index) 
    {
        var radioItems = $('<ul>');
        var item;
        var input = '';
        for (var i = 0; i < allQuestions[index].options.length; i++) {
          item = $('<li>');
          input = '<input type="radio" name="answer" value=' + i + ' />';
          input += allQuestions[index].options[i];
          item.append(input);
          radioItems.append(item);
        }
        return radioItems;
  }
  
  function chooseOption() 
    {
        selectOptions[quesCounter] = +$('input[name="answer"]:checked').val();
    }
   
  function nextQuestion() 
    {
        quizSpace.fadeOut(function() 
            {
              $('#question').remove();
              if(quesCounter < allQuestions.length)
                {
                    var nextQuestion = createElement(quesCounter);
                    quizSpace.append(nextQuestion).fadeIn();
                    if (!(isNaN(selectOptions[quesCounter]))) 
                    {
                      $('input[value='+selectOptions[quesCounter]+']').prop('checked', true);
                    }
                    if(quesCounter === 1)
                    {
                      $('#prev').show();
                    } 
                    else if(quesCounter === 0)
                    {
                      $('#prev').hide();
                      $('#next').show();
                    }
                }
              else 
                {
                    var scoreRslt = displayResult();
                    quizSpace.append(scoreRslt).fadeIn();
                    $('#next').hide();
                    $('#prev').hide();
                }
        });
    }
  
  function displayResult() 
    {
        var score = $('<p>',{id: 'question'});
        var correct = 0;
        for (var i = 0; i < selectOptions.length; i++) 
        {
          if (selectOptions[i] === allQuestions[i].answer) 
          {
            correct++;
          }
        }
        score.append('You scored ' + correct + ' out of ' +allQuestions.length);
        return score;
  }
})();