let teams;
let messages;
let nbTeams;
let nbMessages;
let str;

let teamscontainer;
let tempcontainer;
let teambox;
let teamheader;
let teamtitle;
let teambody;

let team;
let messagescontainer;
let question;
let answer;
let form;
let id;
let input;
let button;

let teamsinside = [];
let messagesinside = [];




setInterval(function(){

    $.ajax({
        url: "request/get_team.php",
        method: "POST",
        success: function(data){
            if(data!=""){
                teams = JSON.parse(data);
                nbTeams = Object.keys(teams).length;
                str = nbTeams+" équipe";
                if(nbTeams==1)
                    str+=" est en train de jouer";
                else
                    str+="s sont en train de jouer";
                $("#nb_team").text(str.toUpperCase()); 
                teamscontainer = document.getElementById("teams-container");
                for (let i = 0; i < nbTeams; i++) {
                    if($.inArray(teams[i]['id'], teamsinside)==-1){
                        teambox = document.createElement("div");
                            teambox.className = "team-box";
                        teamheader = document.createElement("div");
                            teamheader.className = "team-header";
                        teamtitle = document.createElement("h4");
                            str = "Equipe : "+teams[i]['player1'];
                            for (let j = 2; j < 5; j++)
                                if (teams[i]['player'+j]!="")
                                    str+=" - "+teams[i]['player'+j];
                            str+="  |  Escape Game n°"+teams[i]['game'];
                            teamtitle.textContent = str;
                        teambody = document.createElement("div");
                            teambody.className = "team-body";
                            teambody.id = "team"+teams[i]['id'];
                        teamheader.appendChild(teamtitle);
                        teambox.appendChild(teamheader);
                        teambox.appendChild(teambody);
                        teamscontainer.appendChild(teambox);
                        teamsinside.push(teams[i]['id']);
                    }
                }
            }
            else{
                $("#nb_team").text("Aucune équipe n'est en train de jouer ...");
            }
        }
    });

    $.ajax({
        url: "request/get_message.php",
        method: "POST",
        success: function(data){
            if(data!=""){
                messages = JSON.parse(data);
                nbMessages = Object.keys(messages).length;         
                for (let i = 0; i < nbMessages; i++) {
                    if($.inArray(messages[i]['id'], messagesinside)==-1){
                        team = document.getElementById("team"+messages[i]['team']);
                        messagescontainer = document.createElement("div");
                            messagescontainer.id = "message"+messages[i]['id'];
                        question = document.createElement("p");
                            question.textContent = "Question : "+messages[i]['question'];
                            messagescontainer.appendChild(question);
                        if(messages[i]['answer']!=""){
                            answer = document.createElement("p");
                                answer.className = "answer";
                                answer.textContent = "Réponse : "+messages[i]['answer'];
                                messagescontainer.appendChild(answer);
                        }
                        else{
                            form = document.createElement("form");
                                form.className = "team-body";
                                form.id = "form"+messages[i]['id'];
                                form.method = 'post';
                                form.action = 'gamemaster.php';
                            id = document.createElement("input");
                                id.type = 'hidden'; 
                                id.name = 'id';
                                id.value = messages[i]['id'];
                            input = document.createElement("input");
                                input.type = 'text'; 
                                input.name = 'answer';
                                input.className = 'inputanswer';
                            button = document.createElement("button");
                                button.type = 'button';
                                button.className = 'button';
                                button.id = messages[i]['id'];
                                button.textContent = 'Répondre';
                            form.appendChild(id);
                            form.appendChild(input);
                            form.appendChild(button);
                            messagescontainer.appendChild(form);
                        }
                        $("#team"+messages[i]['team']+" form").hide();
                        team.appendChild(messagescontainer);
                        messagesinside.push(messages[i]['id']);
                    }
                }
            }
        }
    });

    submit = document.getElementsByClassName("button");
    for (var i = 0; i < submit.length; i++) {
        let id = submit[i].id;
        submit[i].addEventListener('click', function(){
            $.ajax({
                url: "request/send_answer.php",
                type: "POST",
                data: $("#form"+id).serialize(),
                success: function(){
                    answer = document.createElement("p");
                        answer.className = "answer";
                        answer.textContent = "Réponse : "+$("#form"+id+" .inputanswer").val();
                    document.getElementById("message"+id).removeChild(document.getElementById("form"+id));
                    document.getElementById("message"+id).appendChild(answer);
                    ;
                }
            });
            return false;
        });
    }

},1000);

$('form').bind("keypress", function(e) {
    if (e.keyCode == 13) {               
      e.preventDefault();
      return false;
    }
});