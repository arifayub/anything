var yummy_tiffins = {
	token: null,
	server_url: null,
	generateToken: function() {
		$.ajax({
			 url: yummy_tiffins.server_url+"/oauth",
			 type: "POST",
			 async:false,
			 data : {'grant_type':'client_credentials','client_id':"testclient",'client_secret':'testpass'},
			 success:function(data)
			 {
				 yummy_tiffins.token = data.access_token;
				 yummy_tiffins.log('Server connected.');
			 }
	 	});
	},
	log: function(message) {
		if( console && console.log ) {
			console.log(message);
		}
		else {
			//alert(message);
		}
	},
	date: {
		current_date: function() {
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1;// because: jan=0...dec=11
			var yyyy = today.getFullYear();
			if(dd<10) {
				dd='0'+dd;
			} 
			if(mm<10) {
				mm='0'+mm;
			}
			return (dd+'/'+mm+'/'+yyyy);
		},
		dmy_to_ymd: function(date_value, separator) {
			var dt_val = date_value.split(separator);
			return (dt_val[2]+'-'+dt_val[1]+'-'+dt_val[0]);
		},
		ymd_to_dmy: function(date_value, separator) {
			var dt_val = date_value.split(separator);
			return (dt_val[2]+'/'+dt_val[1]+'/'+dt_val[0]);
		}
	},
	cart: [],
	delivery_locations: [],
	tax:[],
	delivery_charges:[],
	Object: {
		size: function(obj) {
			var size = 0, key;
			for (key in obj) {
				if (obj.hasOwnProperty(key)) size++;
			}
			return size;
		}
	}
};
