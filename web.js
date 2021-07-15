(function() 
 {
  var allQuestions = [{
    question: "Web page editors works on a ____ principle.",
    options: ["WWW", "HTML", "WYSIWYG", "WYGWYSI"],
    answer: 2
  }, {
    question: "Which program is used by web clients to view the web pages?",
    options: ["Web browser", "Protocol", "Web server", "Search Engine"],
    answer: 0
  }, {
    question: "What is the name of the location address of the hypertext documents?",
    options: ["Uniform Resource Locator", "Web server", "File","Web address"],
    answer: 0
  },{
    question: "What are shared on the Internet and are called as Web pages?",
    options: ["Programs", "Cables", "Hypertext documents", "None"],
    answer: 2
  }, {
    question: "How many colour names are used by the browsers?",
    options: ["8", "10", "12", "16"],
    answer: 3
  },{
    question: "Which tag is used to display text in title bar of a web document?",
    options: ["Body tag", "Meta tag", "Title tag", "Comment tag"],
    answer: 2
  },{
    question: "The ____ attribute is used to identify the values of variables.",
    options: ["text", "http-equiv", "content", "name"],
    answer: 2
  },{
    question: "The language that instructs the browser on how to display the hypertext, and adds pictures to the document is __",
    options: ["C", "COBOL", "HTML", "BASIC"],
    answer: 2
  },{
    question: "Which tag is used to identify the keywords describing the site?",
    options: ["GComment tag", "Title tag", "Meta tag", "Anchor tag"],
    answer: 2
  },{
    question: "Which are used with a tag to modify its function?",
    options: [" Files", "Functions", "Attributes", "Documents"],
    answer: 2
    }];
  
  var quesCounter = 0;
  var selectOptions = [];
  var quizSpace = $('#web');
    
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