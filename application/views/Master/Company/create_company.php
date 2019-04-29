<style>
:root {
    --background-color: #fff;
    --border-color: #ccc;
    --text-color: #555;
    --selected-text-color: #C0392B;
    --hover-background-color: #eee;
}

.yearpicker-container {
    position: absolute;
    color: var(--text-color);
    width: 280px;
    border: 1px solid var(--border-color);
    border-radius: 3px;
    font-size: 1rem;
    box-shadow: 1px 1px 8px 0px rgba(0,0,0,0.2);
    background-color: var(--background-color);
}

.yearpicker-header {
    display: flex;
    width: 100%;
    height: 2.5rem;
    border-bottom: 1px solid var(--border-color);
    align-items: center;
    justify-content: space-around;
}

.yearpicker-prev,
.yearpicker-next {
    cursor: pointer;
    font-size: 2rem;
}

.yearpicker-prev:hover,
.yearpicker-next:hover {
    color: var(--selected-text-color);
}

.yearpicker-year {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0.5rem;
}

.yearpicker-items {
    list-style: none;
    padding: 1rem 0.5rem;
    flex: 0 0 33.3%;
    width: 100%;
}

.yearpicker-items:hover {
    background-color: var(--hover-background-color);
    color: var(--selected-text-color);
    cursor: pointer;
}

.yearpicker-items.selected {
    color: var(--selected-text-color);
}
.hide{
    display: none;
}


</style>
<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup/company_sub');?>">Company</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              
                 <?php echo form_open(); ?>
                  <div class="row row-lg">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <h4 class="example-title">Create Company</h4> 
                        
                         <?php echo $this->session->flashdata('response'); ?>
                        
                          <div class="example">                    
                                                
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Company Code: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('type' =>'number', 'name' => 'company_code','id'=>'ccode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','maxlength'=>'4')); ?><span><p  id="code_div" style="color:red;display:none">Code already exist</p></span>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Title: </label>
                              <div class="col-md-8">
                                <select class="form-control" name="title">
                                  <option value="M/s.">M/s.</option>
                                </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Company Name </label>
                              <div class="col-md-8">
                              <?php echo form_input(array('type' =>'text', 'name' => 'company_name','id'=>'company_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div>  
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label" ></label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'company_name2', 'name' => 'company_name2','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>     <div class="form-group row">
                              <label class="col-md-4 col-form-label" ></label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'company_name3', 'name' => 'company_name3','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>  
                            <!-- <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Plant</label>
                              <div class="col-md-8">
                                <select class="form-control" id="plant_id" name="plant_id" required="true">
                                  <option value="">Select</option> 
                                  <?php /* foreach($plant as $row)
                                    {
                                      echo '<option value="'.$row->id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                                    } */ ?>   
                                </select>
                              </div>
                            </div>  -->
                             <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Finincial year From</label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'period_from', 'name' => 'period_from','class'=>'form-control yearpicker','style'=>'margin-bottom:5px','autocomplete'=>'false','required'=>'true')); ?>
                              </div>
                            </div>  
                             <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Finincial year To</label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'period_to', 'name' => 'period_to','class'=>'form-control yearpicker','style'=>'margin-bottom:5px','autocomplete'=>'false','required'=>'true')); ?>
                              </div>
                            </div>  

                             <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Language</label>
                              <div class="col-md-8">
                                <select class="form-control" id="language" name="language">
                                  <option value="English">English</option> 
                                </select>
                              </div>
                            </div>  
                             <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Currency</label>
                              <div class="col-md-8">
                                <select class="form-control" id="currency" name="currency" required="true">
                                  <option value="">Select</option> 
                                  <?php foreach($currency as $row)
                                    {
                                      echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                                    } ?>   
                                </select>
                              </div>
                            </div>  
                                                  
                        </div>
                      </div>                     
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                     <h4 class="example-title">Communication</h4> 
                      <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Telephone</label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'tel','id' => 'telephone', 'name' => 'telephone','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'12')); ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Mobile</label>
                              <div class="col-md-7">
                                <?php echo form_input(array('type' => 'tel','id' => 'mobile_1', 'name' => 'mobile_1','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'12','required'=>'required')); ?>
                                 
                              </div>
                              <div class="col-md-1" style="float:left">
                                <button  type="button" id="add_more_mobile">+</button>
                              </div>

                            </div>  
                            <div id="mobile_div"></div>
                            <input type="hidden" id="h1" name="h1" value="1">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Email</label>
                              <div class="col-md-7">
                                <?php echo form_input(array('type' => 'email','id' => 'email_1', 'name' => 'email_1','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'100')); ?>
                              </div>
                              <div class="col-md-1" style="float:left">
                                <button  type="button" id="add_more_email">+</button>
                               
                              </div>
                            </div>  
                            <div id="email_div"></div>
                             <input type="hidden" id="h2" name="h2" value="1">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label" >Fax</label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'fax', 'name' => 'fax','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label">Country: </label>
                        <div class="col-md-8">
                          <select id="country" name="country"   class="form-control">
                            <option value="India">India</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Region: </label>
                        <div class="col-md-8">
                          <select id="region_id" name="region" class="form-control" required="true">
                            <option value="">Select</option>                      
                              <?php foreach($states as $row)     
                              {
                                echo '<option value="'.$row->id.'">'.$row->TIN_no.'-'.$row->name.'</option>';
                              }   ?>  
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">City: </label>
                          <div class="col-md-8">
                            <select id="city_id" name="city" class="form-control"  required="true">
                              <option value="">Select</option>
                              
                            </select>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label" >Pin Code</label>
                        <div class="col-md-8">
                          <?php echo form_input(array('type' => 'number','id' => 'pincode', 'name' => 'pincode','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'20')); ?>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Postal Address: </label>
                        <div class="col-md-8">
                          <textarea class="form-control" id="postal_address" name="postal_address" placeholder="Address" autocomplete="off" rows="5"></textarea>
                        </div>
                      </div>


                    </div>
                  
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <input type="hidden" name="sub" value="1">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                  </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
    </body>
<?php $this->load->view('layout/admin/footer'); ?>
<script>
$(function(){
  $('#region_id').change(function(){
    var region_id       =$('#region_id').val();
    $('#city_id').empty(); 
      var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_get_cities";       
        jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {region_id: region_id},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#city_id')
                  .append($("<option></option>")
                  .attr("value",jsonObject['city_name'])
                  .text(jsonObject['city_name']));               
            });        
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
       });
  });


  $('#ccode').click(function(){ 
    $('#code_div').hide();  
   });
  $('#ccode').blur(function(){ 
    var ccode=$('#ccode').val();      
    var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_company_code";  
      jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {ccode: ccode}, 
        success: function (response) {  
            
          if(response==1){
            $('#code_div').show();  
            $('#ccode').val('');  
          }
                 
        }, 
        error: function (jqXhr, textStatus, errorMessage) {           
           $('p').append('Error' + errorMessage); 
        } 
     }); 
  }); 
$('#ccode').keyup(function(){
   var len=$('#ccode').val();
   if(len.length > 4){
    $('#ccode').val('');
    alert("Code number should 4 digit only");
   }
});

//var i=1;
$('#add_more_mobile').click(function(){
  //i++;
  var h1=$('#h1').val();
  var i=parseInt(h1)+1;
  $('#h1').val(i);
  
  var html='';
  
  html+='<div class="form-group row" id="r_'+i+'">';
  html+='<label class="col-md-4 col-form-label" >Mobile</label>';
  html+='<div class="col-md-7">';
  html+='<input type="tel" id ="mobile_'+i+'"name="mobile_'+i+'" class="form-control" style="margin-bottom:5px" autocomplete="false" maxlength="12">';
  html+='</div>';
  html+='<div class="col-md-1">';
  html+='<button  type="button" class="mb" id="'+i+'">&nbsp;- </button>';
  html+='</div>'; 
  html+='</div>';                           
  
  
  $('#mobile_div').append(html);

  $('.mb').click(function(){
    var id=(this.id);
    $('#r_'+id).remove();
  });   
});

$('#add_more_email').click(function(){
  //i++;
  var h2=$('#h2').val();
  var i=parseInt(h2)+1;
  $('#h2').val(i);
  
  var html='';
  
  html+='<div class="form-group row" id="j_'+i+'">';
  html+='<label class="col-md-4 col-form-label" >Email</label>';
  html+='<div class="col-md-7">';
  html+='<input type="email" id ="email_'+i+'"name="email_'+i+'" class="form-control" style="margin-bottom:5px" autocomplete="false" maxlength="100">';
  html+='</div>';
  html+='<div class="col-md-1">';
  html+='<button  type="button" class="em" id="'+i+'">&nbsp;- </button>';
  html+='</div>'; 
  html+='</div>';                           
  
  
  $('#email_div').append(html);

  $('.em').click(function(){
    var id=(this.id);
    $('#j_'+id).remove();
  });   
});

});

</script>    

<script>
const version = '1.0.0';
const appName = 'YearPicker';


var defaults = {
    // Auto Hide
    autoHide: true,
    // The Initial Date
    year: null,
    // Start Date
    startYear: null,
    // End Date
    endYear: null,
    // A element tag items
    itemTag: 'li',
    //css class selected date item 
    selectedClass: 'selected',
    // css class disabled
    disabledClass: 'disabled',
    hideClass: 'hide',
    highlightedClass: 'highlighted',
    template: `<div class="yearpicker-container">
                    <div class="yearpicker-header">
                        <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                        <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                        <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
                    </div>
                    <div class="yearpicker-body">
                        <ul class="yearpicker-year" data-view="years">
                        </ul>
                    </div>
                </div>
`,

    // Event shortcuts
    show: null,
    hide: null,
    pick: null
};

var window = typeof window !== 'undefained' ? window : {};

var event_click = 'click.';
var event_focus = 'focus.';
var event_keyup = 'keyup.';
var event_selected = 'selected.';
var event_show = 'show.';
var event_hide = 'hide.';

var methods = {
    // Show datepicker
    showView: function showView() {
        if (!this.build) {
            this.init();
        }

        if (this.show) {
            return;
        }

        if (this.trigger(event_show).isDefaultPrevented()) {
            return;
        }
        this.show = true;
        var $template = this.$template,
            options = this.options;

        $template.removeClass(options.hideClass).on(event_click, $.proxy(this.click, this));
        $(document).on(event_click, this.onGlobalClick = proxy(this.globalClick, this));
        this.place();
    },

    // Hide the datepicker
    hideView: function hideView() {
        if (!this.show) {
            return;
        }

        if (this.trigger(event_hide).isDefaultPrevented()) {
            return;
        }

        var $template = this.$template,
            options = this.options;
        
        $template.addClass(options.hideClass).off(event_click,this.click);
        $(document).off(event_click,this.onGlobalClick);
        this.show = false;
    },
    // toggle show and hide
    toggle: function toggle() {
        if (this.show) {
            this.hideView();
        } else {
            this.show();
        }
    },
    setStartYear: function setStartYear(year) {
        this.startYear = year;

        if (this.build) {
            this.render();
        }
    },
    setEndYear: function setEndYear(year) {
        this.endYear = year;
        if (this.build) {
            this.render();
        }
    }
};

var handlers = {
    click: function click(e) {
        var $target = $(e.target);
        var options = this.options;
        var viewYear = this.viewYear;
        if ($target.hasClass('disabled')) {
            return;
        }
        var view = $target.data('view')
        switch (view) {
            case 'yearpicker-prev':
                var year = viewYear - 12;
                this.viewYear = year;
                this.renderYear();
                break;
            case 'yearpicker-next':
                var year = viewYear + 12;
                this.viewYear = year;
                this.renderYear();
                break;
            case 'yearpicker-items':
                this.year = parseInt($target.html());
                this.renderYear();
                this.hideView();
                break;
            default:
                break;
        }
    },
    globalClick: function globalClick(_ref) {
        var target = _ref.target;
        var element = this.element;
        var hidden = true;

        if (target !== document) {
            while (target === element || $(target).closest('.yearpicker-header').length === 1) {
                hidden = false;
                break;
            }

            target = target.parentNode;
        }

        if (hidden) {
            this.hideView();
        }
    }
}

var render = {
    renderYear: function renderYear() {
        var options = this.options,
            startYear = this.startYear,
            endYear = this.endYear;
        var disabledClass = options.disabledClass;

        // viewed year in the calenter
        var viewYear = this.viewYear;
        // selected year 
        var selectedYear = this.year;
        var now = new Date();
        // current year
        var thisYear = now.getFullYear();

        var start = -5;
        var end = 6;
        var items = [];
        var prevDisabled = false;
        var nextDisabled = false;
        var i = void 0;

        for (i = start; i <= end; i++) {
            var year = viewYear + i;
            var disabled = false;

            if (startYear) {
                disabled = year < startYear;
                if (i === start) {
                    prevDisabled = disabled;
                }
            }

            if (!disabled && endYear) {
                disabled = year > endYear;
                if (i === end) {
                    nextDisabled = disabled;
                }
            }

            // check for this is a selected year
            var isSelectedYear = year === selectedYear;
            var view = isSelectedYear ? 'yearpicker-items' : 'yearpicker-items';
            items.push(this.createItem({
                selected: isSelectedYear,
                disabled: disabled,
                text: viewYear + i,
                view: disabled ? 'yearpicker disabled' : view,
                highlighted: year === thisYear
            }));
        }

        this.yearsPrev.toggleClass(disabledClass, prevDisabled);
        this.yearsNext.toggleClass(disabledClass, nextDisabled);
        this.yearsCurrent.html(selectedYear);
        this.yearsBody.html(items.join(' '));
        this.setValue();
    }
}

function isString(value) {
    return typeof value === 'string';
}

function isNumber(value) {
    return typeof value === 'number' && value !== 'NaN';
}

function isUndefained(value) {
    return typeof value === 'undefined';
}

function proxy(fn, context) {

    for (var len = arguments.length, args = Array(len > 2 ? len - 2 : 0), key = 2; key < len; key++) {
        args[key - 2] = arguments[key];
    }

    return function () {
        for (var len2 = arguments.length, args2 = Array(len2), key2 = 0; key2 < len2; key2++) {
            args2[key2] = arguments[key2];
        }

        return fn.apply(context, args.concat(args2));
    }
}

'use strict';

var _setupError = 'YearPicker Error';
if (isUndefained(jQuery)) {
    alert(`${appName} ${version} requires jQuery`);
}

var classCheck = function (instance, constractor) {
    if (!(instance instanceof constractor)) {
        alert('cannot call a class as instance of function!!!');
    }
}

var class_top_left = appName + '-top-left';
var class_top_right = appName + '-top-right';
var class_bottom_left = appName + '-bottom-left';
var class_bottom_right = appName + '-bottom-right';
var class_placements = [class_top_left, class_top_right, class_bottom_left, class_bottom_right].join(' ');

var Yearpicker = function () {
    function Yearpicker(element) {
        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

        classCheck(this, Yearpicker);

        this.$element = $(element);
        this.element = element;
        this.options = $.extend({}, defaults, options);
        this.build = false;
        this.show = false;
        this.startYear = null;
        this.endYear = null;

        this.create();
    }

    // yearpicker
    Yearpicker.prototype = {
        create: function () {
            var $this = this.$element,
                options = this.options;
            var startYear = this.startYear,
                endYear = this.endYear,
                year = this.year;

            //this.trigger = $(options.trigger);
            this.isInput = $this.is('input') || $this.is('textarea');
            initialValue = this.getValue();
            this.initialValue = initialValue;
            this.oldValue = initialValue;
            year = year || initialValue || new Date().getFullYear();

            if (startYear) {
                if (year < startYear) {
                    year = startYear;
                }
                this.startYear = startYear;
            }

            if (endYear) {
                if (year > endYear) {
                    year = endYear;
                }
                this.endYear = endYear;
            }

            this.year = year;
            this.viewYear = year;
            this.initialYear = year;
            this.bind();
            this.init();
        },
        init: function () {
            if (this.build) {
                return;
            }
            this.build = true;

            var $this = this.$element,
                options = this.options;
            var $template = $(options.template);
            this.$template = $template;

            this.yearsPrev = $template.find('.yearpicker-prev');
            this.yearsCurrent = $template.find('.yearpicker-current');
            this.yearsNext = $template.find('.yearpicker-next');
            this.yearsBody = $template.find('.yearpicker-year');

            $template.addClass(options.hideClass);
            $(document.body).append($template.addClass(appName + '-dropdown'));
            this.renderYear();

        },
        unbuild: function () {
            if (!this.build) {
                return;
            }
            this.build = false;
            this.$template.remove();
        },
        // assign a events 
        bind: function () {
            var $this = this.$element,
                options = this.options;

            if ($.isFunction(options.show)) {
                $this.on(event_show, options.show);
            }
            if ($.isFunction(options.hide)) {
                $this.on(event_hide, options.hide);
            }
            if ($.isFunction(options.click)) {
                $this.on(event_click, options.click);
            }
            if (this.isInput) {
                $this.on(event_focus, $.proxy(this.showView, this));
            } else {
                $this.on(event_click, $.proxy(this.showView, this));
            }

        },
        getValue: function () {
            var $this = this.$element;
            var value = this.isInput ? $this.val() : $this.text();
            value = parseInt(value);
            return this.isInput ? parseInt($this.val()) : $this.text();
        },
        setValue: function () {
            var $this = this.$element;
            var value = this.year;
            if (this.isInput) {
                $this.val(value);
            } else {
                $this.html(value);
            }
        },
        trigger: function (type, data) {
            var e = $.Event(type, data);
            this.$element.trigger(e);
            return e;
        },
        place: function () {

            var $this = this.$element,
                options = this.options,
                $template = this.$template;

            var containerWidth = $(document).outerWidth(),
                containerHeight = $(document).outerHeight(),
                elementWidth = $this.outerWidth(),
                elementHeight = $this.outerHeight(),
                width = $template.width(),
                height = $template.height();

            var elementOffset = $this.offset(),
                top = elementOffset.top,
                left = elementOffset.left;

            var offset = parseFloat(options.offset);
            var placements = class_top_left;

            offset = isNaN(offset) ? 10 : offset;

            // positioning the y axis
            if (top > height && top + elementHeight + height > containerHeight) {
                top -= height + offset;
                placements = class_bottom_left;
            } else {
                top += elementHeight + offset;
            }

            // positioning the x axis
            if (left + width > containerWidth) {
                left += elementWidth - width;
                placements = placements.replace('left', 'right');
            }

            $template.removeClass(class_placements).addClass(placements).css({
                top: top,
                left: left,
                zIndex: parseInt(this.zIndex, 10)
            })

        },
        createItem: function (data) {
            var options = this.options;
            var itemTag = options.itemTag;

            var items = {
                text: '',
                view: '',
                selected: false,
                disabled: false,
                highlighted: false
            };

            var classes = [];
            $.extend(items, data);
            if (items.selected) {
                classes.push(options.selectedClass);
            }

            if (items.disabled) {
                classes.push(options.disabledClass);
            }

            if (items.highlighted) {
                classes.push(options.highlightedClass)
            }

            return `<${itemTag} class="${items.view} ${classes.join(' ')}" data-view="${items.view}">${items.text}</${itemTag}>`
        }
    }

    return Yearpicker;
}();

if ($.extend) {
    $.extend(Yearpicker.prototype, methods, render, handlers);
}

if ($.fn) {
    $.fn.yearpicker = function jQueryYearpicker(option) {
        for (var len = arguments.length, args = Array(len > 1 ? len - 1 : 0), key = 1; key < len; key++) {
            args[key - 1] = arguments[key];
        }
        var result = void 0;

        this.each(function (i, element) {
            var $element = $(element);
            var isDestory = option === 'destroy';
            var yearpicker = $element.data(appName);

            if (!yearpicker) {
                if (isDestory) {
                    return;
                }
                var options = $.extend({}, $element.data(), $.isPlainObject(option) && option);
                yearpicker = new Yearpicker(element, options);
                $element.data(appName, yearpicker);
            }
            if (isString(option)) {
                var fn = yearpicker[option];

                if ($.isFunction(fn)) {
                    result = fn.apply(yearpicker, args);

                    if (isDestory) {
                        $element.removeData(appName);
                    }
                }
            }
        });

        return !isUndefained(result) ? result : this;
    };
    $.fn.yearpicker.constractor = Yearpicker;
};

$('.yearpicker').yearpicker();
</script>