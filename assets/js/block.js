wp.blocks.registerBlockType("ourtheme/wordpressblocks",{
	title:"custom block",
	icon:"smiley",
	category:"layout",
	attributes: {
		// content: {
		// type: 'array',
		// source: 'children',
		// selector: 'p',
		// },
	},
	edit: function(){	
		return wp.element.createElement("h3",null,"hello, this is form the admin editor screen.")

	},
	save:function(){
		return wp.element.createElement("h1",null,"this is the frontend.")

	}

}); 

// alert("nknkn");
// registerBlockType(
// 	metadata,
// 	{
// 		icon: {
// 			src: <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" enable-background="new 0 0 512 512">
// 				<g>
// 					<g>
// 						<path d="m499.2,203.5l-123-187.8c-3.2-4.9-10.1-6.9-15.8-2.1l-273.4,226.6c-4.2,3.1-5.3,9.4-2.1,13.6l124.1,187.8c3.8,5.7 11.6,5.1 14.7,2.1l273.4-226.6c4.2-3.1 5.2-9.4 2.1-13.6zm-147.1-155.6l-38,215.4-194.5-23.2 232.5-192.2zm-132.6,371.7l-104.1-158.7 207.1,25.5h1.1c4.2,0 9.5-4.2 10.5-10.5l39.5-227 103.5,157.8-257.6,212.9z"/>
// 						<polygon points="75.8,322 11,375.6 24.4,391.7 89.2,338.2"/>
// 						<polygon points="97,376.2 32.3,429.7 45.7,445.9 110.4,392.3"/>
// 						<polygon points="54.2,484.7 67.6,500.9 132.4,447.3 118.9,431.2"/>
// 					</g>
// 				</g>
// 			</svg>
// 		},
// 		edit: Edit,
// 		save: Save
// 	}
// )