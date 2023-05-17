const quiz = [
    {
      question: "Q1: What are your strengths?",
      a: "Creative thinking", 
      b: "Attention to detail", 
      c: "Leadership skills", 
      d: "Good communication",
      ans: "ans2"
    },
    {
      question: "Q2: What are your weaknesses?",
      a: "Lack of experience", 
      b: "Poor time management",
      c: "Difficulty with public speaking", 
      d: "Not confident in decision-making",
      ans: "ans3"
    },
    {
      question: "Q3: What type of work environment do you prefer?",
      a: "Fast-paced and dynamic", 
      b: "Quiet and structured", 
      c: "Collaborative and team-oriented", 
      d: "Independent and self-directed",
      ans: "ans4"
    },
    {
        question: "Q4: What motivates you?",
        a: "Recognition and rewards",
        b: "Helping others", 
        c: "Learning and personal growth", 
        d: "Financial stability",
        ans: "ans1"
      },
      {
        question: "Q5: What are your career goals?",
        a: "Advancement to leadership positions", 
        b: "Specialization in a particular field", 
        c: "Starting your own business", 
        d: "Helping others",
        ans: "ans2" 
      }
    ];
  
    const question = document.querySelector('.question');
    const option1 = document.querySelector('#option1');
    const option2 = document.querySelector('#option2');
    const option3 = document.querySelector('#option3');
    const option4 = document.querySelector('#option4');
    const submit = document.querySelector('#submit');
  
    const answers = document.querySelectorAll('.answer');
    const showScore = document.querySelector('#showScore');
    let questionCount = 0;
     let score=0;
  
    const loadQuestion = ()=>{
      const questionList = quiz[questionCount];
  
      question.innerText = questionList.question;
  
      option1.innerText = questionList.a;
      option2.innerText = questionList.b;
      option3.innerText = questionList.c;
      option4.innerText = questionList.d;
  
    }
    loadQuestion();
  
    const getCheckAnswer=()=>{
      let answer;
      answers.forEach((curAnsElem)=>{
          if(curAnsElem.checked){
              answer = curAnsElem.id;
          }
        });
        return answer;
      };
    
      const deselectAll=()=>{
        answers.forEach((curAnsElem) => curAnsElem.checked = false);
      }
      submit.addEventListener('click',()=>{
        const checkedAnswer = getCheckAnswer();
        console.log(checkedAnswer);
        if(checkedAnswer === quiz[questionCount].ans){
            score++;
        };
        questionCount++;
        deselectAll();
    
        if(questionCount < quiz.length){
            loadQuestion();
        }else{
               showScore.innerHTML = `
               <h3> You scored ${score}/${quiz.length} </h3>
               <button class="btn" onclick="location.reload()">Attempt Again</button>
    
               `;
               showScore.classList.remove('scoreArea');
        }
      });    