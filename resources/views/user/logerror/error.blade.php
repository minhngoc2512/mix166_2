@if(count($errors)>0)
    <?php $a='';
    ?>

        @foreach($errors->all() as $errors)
            <?php $a .= $errors.'\n' ?>
        @endforeach

    <script>
        alert("{{$a}}");
    </script>


@endif