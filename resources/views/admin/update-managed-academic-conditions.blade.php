@extends('design.bootstrap-head')

<!-- Modal -->
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalScrollableTitle" style="text-align:center;">Update Academic Holidays Conditions</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              @if (\Session::has('Updated'))
                <div class="alert alert-success">
                <ul>
                <li>{!! \Session::get('Updated') !!}</li>
                </ul>
                </div>
                @endif
                @if (\Session::has('Not Updated'))
                <div class="alert alert-danger">
                <ul>
                <li>{!! \Session::get('Not Updated') !!}</li>
                </ul>
                </div>
                @endif

      <form action="/admin/update-managed-conditions" method="POST">
        {{ csrf_field() }}
    <div class="form-group">
    <input type="text" class="form-control" value=<?php echo Auth::User()->name;?>
    name="Name" readonly>
  </div>
    <div class="form-group">
    <input type="text" class="form-control" value="Academic"
    name="Role" readonly>
  </div>
    <label for="HolidaysPerYear">Holidays Per Year  Before: <?php echo $yearly;?></label>
    <select class="form-control" name="SelectHolidaysPerYear">
    <?php
    for ($i=1; $i<=30; $i++)
    {
    ?>
      <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInJanuary">Holidays In January Before: <?php echo $january; ?></label>
    <select class="form-control" name="SelectHolidaysInJanuary">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInFebruary">Holidays In February Before: <?php echo $february; ?></label>
    <select class="form-control" name="SelectHolidaysInFebruary">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInMarch">Holidays In March Before: <?php echo $march; ?></label>
    <select class="form-control" name="SelectHolidaysInMarch">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInApril">Holidays In April Before: <?php echo $april; ?></label>
    <select class="form-control" name="SelectHolidaysInApril">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInMay">Holidays In May Before: <?php echo $may; ?></label>
    <select class="form-control" name="SelectHolidaysInMay">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInjune">Holidays In June Before: <?php echo $june; ?></label>
    <select class="form-control" name="SelectHolidaysInjune">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInJuly">Holidays In July Before: <?php echo $july; ?></label>
    <select class="form-control" name="SelectHolidaysInJuly">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInAugust">Holidays In August Before: <?php echo $august; ?></label>
    <select class="form-control" name="SelectHolidaysInAugust">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInSeptember">Holidays In September Before: <?php echo $september; ?></label>
    <select class="form-control" name="SelectHolidaysInSeptember">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInOctober">Holidays In October Before: <?php echo $october; ?></label>
    <select class="form-control" name="SelectHolidaysInOctober">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInNovember">Holidays In November Before: <?php echo $november; ?></label>
    <select class="form-control" name="SelectHolidaysInNovember">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>
    <label for="HolidaysInDecember">Holidays In December Before: <?php echo $december; ?></label>
    <select class="form-control" name="SelectHolidaysInDecember">
    <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select><br>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("/admin") }}'">Close</button>
        <input type="submit" value="Save Changes" class="btn btn-primary">
      </div>
    </div>
  </div>
