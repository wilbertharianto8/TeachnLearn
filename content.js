(function() 
 {
  var allQuestions = [{
    question: "Which one of the following theory has the attribute of moderate risk taking as a function of skill, not chance?",
    options: ["Need for independence", "Need for achievement", "Need for affiliation", "Need for authority"],
    answer: 1
  }, {
    question: "Foundation companies are formed from:",
    options: ["Fashion", "Research and development", "Most popular business", "winding up company"],
    answer: 1
  }, {
    question: "‘All of the following are the broad categories of External forces EXCEPT:",
    options: ["Economic forces", "S Socioeconomic forces", "Technological forces","Competitive forces"],
    answer: 1
  },{
    question: "A ______________ is a professional money manager who makes risk investment from a pool of equity capital to obtain a high rate of return on investments.",
    options: ["venture capitalist", "entrepreneur", "businessman", "buyer"],
    answer: 0
  }, {
    question: "Members of distribution channels are excellent sources for new ideas because:",
    options: ["They are familiar with the needs of the market", "They earn a handsome profit from new business", "They do not bother if entrepreneur bears a loss", "They have well-developed sales force"],
    answer: 0
  },{
    question: "Which of the following geographical area is having least interest to U.S. entrepreneurs?",
    options: ["Europe", "The Far East", "Central Asia", "Transition economies"],
    answer: 2
  },{
    question: "Andrew Carnegie is an example of entrepreneur of which century:",
    options: ["Earliest period", "19th and 20th century", "Middle ages", "17th century"],
    answer: 1
  },{
    question: "The activity which occurs when the new venture is started are called:",
    options: ["Business skills", "Motivation", "Departure point", "Goal orientation"],
    answer: 2
  },{
    question: "The business plan should be prepared by:",
    options: ["Entrepreneurs", "Consultants", "Engineers", "Small business administration services"],
    answer: 0
  },{
    question: "What is the primary concern of founders who trade equity for capital for their growing venture?",
    options: ["Capitalization", "Control", "Valuation", "Investor capabilities"],
    answer: 0
    }];
  
  var quesCounter = 0;
  var selectOptions = [];
  var quizSpace = $('#content');
    
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