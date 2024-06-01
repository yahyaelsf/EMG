<?php

namespace App\Models;

class TContact extends BaseModel
{
    protected $table = "t_contact";
    protected $appends = ['enabled_html'];
    
    protected $fillable = [
        'fk_i_user_id',
        's_title',
        's_name',
        's_mobile',
        's_email',
        's_address',
        's_content',
        'b_seen',
        'e_type'
    ];


    public function getEnabledHtmlAttribute()
    {
        return '<span class="kt-switch kt-switch--icon kt-switch--sm">
                    <label>
                        <input type="checkbox" data-id="' . $this->getKey() . '" name="status" class="js-switch"' . ($this->b_seen == 1 ? 'checked' : '') . ">
                        <span></span>
                	</label>
				</span>";
    }

}
