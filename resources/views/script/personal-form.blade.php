<script type="text/javascript">

var Script = function () {



    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        // validate signup form on keyup and submit
        $("#frm-create-student").validate({
            rules: {
                primary_phone_number: {
                    required: true,
                    minlength: 10
                },
                current_address: {
                    required: true,
                    minlength: 10
                },

                province: {
                    required: true,
                    minlength: 3
                },

                cover_letter: {
                    required: false,
                    minlength: 3
                },


                address: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                primary_phone_number: {
                    required: "Please enter a phone number.",
                    minlength: "Your Full Name must consist of at least 10 characters long."
                },

                current_address: {
                    required: "Please enter a current_address.",
                    minlength: "Your first name must consist of at least 10 characters long."
                },

                province: {
                    required: "Please enter a second name.",
                    minlength: "Your second name must consist of at least 3 characters long."
                },

                last_name: {

                    minlength: "Your last name must consist of at least 3 characters long."
                },

                address: {
                    required: "Please enter a Address.",
                    minlength: "Your Address must consist of at least 10 characters long."
                },
                username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 5 characters long."
                },
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 8 characters long."
                },
                password_confirmation: {
                    required: "Please provide a password confirmation.",
                    minlength: "Your password must be at least 8 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                email: "Please enter a valid email address.",
                agree: "Please accept our terms & condition."
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();

</script>
