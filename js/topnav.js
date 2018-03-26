// // Updates all statistics in the topnav
// function updateTopnav() {
//     var topnav = document.getElementById('myTopnav');

//     var doingsection = document.getElementById('doing');
//     var donesection = document.getElementById('done');

//     var title = document.getElementById('boardtitle');
//     var task = document.getElementById('taskcompletion');
//     var effort = document.getElementById('effortcompletion');
//     var team = document.getElementById('teamproductivity');
//     var user = document.getElementById('username');

//     var cardlist = document.getElementsByClassName('board-card');
//     var doinglist = doingsection.getElementsByClassName('board-card');
//     var donelist = donesection.getElementsByClassName('board-card');

//     // var effortcount = 0;
//     // for (i = 0; i < cardlist.length; i++) {
//     //     effortcount += parseInt(cardlist[i].getElementsByClassName('cEffort')[0].innerHTML);
//     // }
//     // var effortdone = 0;
//     // for (i = 0; i < donelist.length; i++) {
//     //     effortdone += parseInt(donelist[i].getElementsByClassName('cEffort')[0].innerHTML);
//     // }

//     var taskcount = cardlist.length;
//     var taskdone = donelist.length;

//     // var teamcheck = [];
//     // for (i = 0; i < users.length; i++)
//     //     teamcheck.push(0);

//     // for (i = 0; i < doinglist.length; i++) {
//     //     var owner = doinglist[i].getElementsByClassName('cOwn')[0].innerHTML;
//     //     teamcheck[getListId(owner, users)]++;
//     // }

//     // Set values now that we have all the data
//     title.innerHTML = getBoardTitle();

//     if (cardlist.length === 0) {
//         task.innerHTML = "Welcome to PlanMe"

//         effort.innerHTML = "Press '+' to add an item";

//         team.innerHTML = "Empty board";
//     }
//     else {
//         task.innerHTML = round(taskdone / taskcount * 100, 1) + "% Task Completion";

//         effort.innerHTML = round(effortdone / effortcount * 100, 1) + "% Effort Completion";

//         team.innerHTML = computeTeamProductivity(teamcheck) + "% Team Productivity";
//     }

//     user.innerHTML = 'Nick'
// }

// // Calculation for team productivity
// function computeTeamProductivity(teamarr) {
//     var count = 0;
//     var total = teamarr.length;
//     for (i = 0; i < teamarr.length; i++)
//         if (teamarr[i] > 0)
//             count++;

//     return round(count / total * 100, 1);
// }