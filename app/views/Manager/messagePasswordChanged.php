

    <style>

        .whole {
            /* margin-top: 0; */
            z-index: 20;
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: transparent; */
            backdrop-filter: blur(5px);

        }

        .password-changed-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-wrap: wrap;
            background-color: white;
            max-width: 350px;
            margin: 200px auto;
            padding: 50px;
            border: 2px solid #BB8A04;
            border-radius: 20px;
            /* outline: black; */
        }

        .password-changed-box .done-btn {
            border: 2px solid #BB8A04;
            color: white;
            background-color: #BB8A04;
            border-radius: 20px;
            padding: 2px 40px;
            text-decoration: none;

        }

        .password-changed-box .done-btn:hover {
            opacity: 0.8;
        }

        .password-changed-box p {
            font-size: x-large;
            font-weight: 900;
            padding-bottom: 60px;
        }

        @media screen and (max-width:355px) {
            .password-changed-box {
                max-width: 300px;
                padding: 20px;

            }
        }

        @media screen and (max-width:300px) {
            .password-changed-box {
                max-width: fit-content;
            }
        }
    </style>

    <section style="display:none;" class="whole" id="password-changed-message-box">
        <div class="password-changed-box">
            <p>Password Changed</p>
            <button type="button" id="done-btn" class="done-btn">Done</button>
        </div>
    </section>


