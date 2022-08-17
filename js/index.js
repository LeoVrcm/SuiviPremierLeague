let nextMatchweek = 1;
function getActualMatchweek(i) {

    let todayDate = new Date();
    let todayMs = todayDate.getTime();
    let mwDate = new Date(mwDateArray[i]);
    let mwMs = mwDate.getTime();

    if (mwMs < todayMs) {
        nextMatchweek += 1;
    } else {
        return nextMatchweek;
    }
};

let mwDateArray = ["2021, 8, 16", "2021, 8, 24", "2021, 8, 30", // AOUT
    "2021, 9, 14", "2021, 9, 20", "2021, 9, 28", // SEPTEMBRE
    "2021, 10, 4", "2021, 10, 19", "2021, 10, 25", // OCTOBRE
    "2021, 11, 2", "2021, 11, 8", "2021, 11, 22", "2021, 11, 29", // NOVEMBRE
    "2021, 12, 2", "2021, 12, 6", "2021, 12, 13", "2021, 12, 17", "2021, 12, 20", "2021, 12, 28", "2021, 12, 31", // DECEMBRE
    "2022, 1, 4", "2022, 1, 17", "2022, 1, 24", // JANVIER
    "2022, 2, 10", "2022, 2, 13", "2022, 2, 20", "2022, 2, 27", // FEVRIER
    "2022, 3, 6", "2022, 3, 13", "2022, 3, 20", // MARS
    "2022, 4, 3", "2022, 4, 10", "2022, 4, 17", "2022, 4, 24", // AVRIL
    "2022, 5, 1", "2022, 5, 8", "2022, 5, 16", "2022, 5, 23"]; // MAI
    
    

for (let i = 0; i <= 37; i++) {
    var actualMatchweek = getActualMatchweek(i);
};

/* HEADER */

$("#fixturesBtn").prop("href", "/SuiviPremierLeague/boundaries/FixturesIHM.php?matchweekSelect=" + actualMatchweek);

$("#logOutBtn").on("click", function () {
    alert("Disconnected !");
});



/* HOME */

$("#homePLTOTWMatchday").text("Team of the week - Matchweek " + (actualMatchweek - 2));

/* FORMULAIRES LOGIN ET REGISTER */

$("#loginShowPwd").on("click", function () {
    let loginCheckBox = $("#loginShowPwd")[0];

    if (loginCheckBox.checked === true) {
        $("#pwdconnect").prop("type", "text");

    } else {
        $("#pwdconnect").prop("type", "password");

    }
});

$("#registerShowPwd").on("click", function () {
    let registerCheckBox = $("#registerShowPwd")[0];

    if (registerCheckBox.checked === true) {
        $("#userPassword").prop("type", "text");
        $("#userPasswordVerif").prop("type", "text");

    } else {
        $("#userPassword").prop("type", "password");
        $("#userPasswordVerif").prop("type", "password");
    }
});

$("#forgotPasswordForm").on("submit", function () {
    alert("An email has been sent to you !");
});

/* FIXTURES */


$("#matchweekSelect").change(function () {
    console.log($("#matchweekSelect").val());
    var matchweekForm = $("#matchweekForm");
    $(matchweekForm).submit();

});

$("#matchweekSelect").change(function () {
    console.log($("#matchweekSelect").val());
    var matchweekForm = $("#matchweekForm");
    $(matchweekForm).submit();
});

/* MY CLUB  */




