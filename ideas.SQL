    # CODE BELOW CREATES THE DATABASE TABLE STRUCTURE
    
SELECT
    `core`.`players`.`player_ID` AS `player_ID`,
    `core`.`players`.`fname` AS `fname`,
    `core`.`players`.`lname` AS `lname`,
    `core`.`players`.`club` AS `club`,
    `core`.`players`.`age` AS `age`,
    `core`.`players`.`nationality` AS `nationality`,
    `core`.`players`.`player_pic` AS `player_pic`,
    `core`.`players`.`position` AS `position`,
    `core`.`players`.`appearances` AS `appearances`,
    `core`.`players`.`minutes_played` AS `minutes_played`,
    `core`.`players`.`pass_attempt` AS `pass_attempt`,
    `core`.`players`.`pass_comp` AS `pass_comp`,    
     # **********************ENDS HERE**************************** #
     
    
    #THE CODE BELOW CALCULATES THE TOTAL POINTS ACCUMULATED FOR A PLAYER
    CONCAT(
        `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 1
    ) AS `pass_accuracy`,
    `core`.`players`.`tackle_attempt` AS `tackle_attempt`,
    `core`.`players`.`tackle_comp` AS `tackle_comp`,
    CONCAT(
        `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 1
    ) AS `tackle_success`,
    `core`.`players`.`aerials_contested` AS `aerials_contested`,
    `core`.`players`.`aerials_won` AS `aerials_won`,
    CONCAT(
        `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 1
    ) AS `aerial_success`,
    `core`.`players`.`possession_won` AS `possession_won`,
    `core`.`players`.`interceptions` AS `interceptions`,
    FLOOR(
        CONCAT(
            `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 40 + `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 40 + `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 20 * `core`.`players`.`appearances`
        )
    ) AS `points`,    
    # **********************ENDS HERE**************************** #
    
    
    # THE CODE BELOW CALCULATES THE PLAYER'S FINAL RATING (1-10)
    # USES A BUNCH OF IF STATEMENTS
    FLOOR(
        CONCAT(
            `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 40 + `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 40 + `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 20 * `core`.`players`.`appearances` / `core`.`players`.`appearances`
        )
    ) AS `points_per_game`,
    IF(
        FLOOR(
            `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 40 + `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 40 + `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 20 * `core`.`players`.`appearances` / `core`.`players`.`appearances`
        ) >= 9000,
        9,
        IF(
            FLOOR(
                `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 40 + `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 40 + `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 20 * `core`.`players`.`appearances` / `core`.`players`.`appearances`
            ) >= 8000,
            8,
            IF(
                FLOOR(
                    `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 40 + `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 40 + `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 20 * `core`.`players`.`appearances` / `core`.`players`.`appearances`
                ) >= 7000,
                7,
                IF(
                    FLOOR(
                        `core`.`players`.`aerials_won` / `core`.`players`.`aerials_contested` * 100 * 40 + `core`.`players`.`tackle_comp` / `core`.`players`.`tackle_attempt` * 100 * 40 + `core`.`players`.`pass_comp` / `core`.`players`.`pass_attempt` * 100 * 20 * `core`.`players`.`appearances` / `core`.`players`.`appearances`
                    ) >= 6000,
                    6,5
                )
            )
        )
    ) AS `rating`    
    # **********************ENDS HERE**************************** #
    
FROM
    `core`.`players`
WHERE
    `core`.`players`.`position` = 'CB' AND `core`.`players`.`league_code` = 'mw-tsl'
ORDER BY
    `points` * 1
DESC
    