
	Ext.onReady(function(){
		Ext.tip.QuickTipManager.init();
		
		Ext.define('mdlcarrera', {
			extend: 'Ext.data.Model'
			,fields: [*
			]
		});
		
		var stcarrera = Ext.create('Ext.data.Store', {
			model: 'mdlcarrera'
			,proxy:{
				type: 'ajax'
				,url: '/siutmach/public/academico/syllabus/obtenercarreraxestudiante'
				,actionMethods: {
					read: 'POST'
				}
				,reader: {
					type: 'json'
					,rootProperty: 'carreras'
				}
			}
		});
		
		Ext.define('mdlmatricula', {
			extend: 'Ext.data.Model'
			,fields: [
				{name:'fecha',type:'date',dateFormat:'Y-m-d'}
				,{name:'tipo',type:'string'}
				,{name:'estado',type:'string'}
				,{name:'nivel',type:'string'}
				,{name:'norden',type:'string'}
				,{name:'seccion',type:'string'}
				,{name:'curso',type:'string'}
				,{name:'numeracion',type:'string'}
				,{name:'asignatura',type:'string'}
				,{name:'credito',type:'string'}
				,{name:'horas',type:'string'}
				,{name:'fobtiene',type:'string'}
				,{name:'mtipo',type:'string'}
				,{name:'docente',type:'string'}
				,{name:'syllabus',type:'int'}
				,{name:'fcodigo',type:'int'}
				,{name:'sestado',type:'string'}
				,{name:'tsyllabus',type:'int'}
				,{name:'dcodigo',type:'int'}
			]
		});

		var stmatricula = Ext.create('Ext.data.Store', {
			model: 'mdlmatricula'
			,proxy:{
				type: 'ajax'
				,url: '/siutmach/public/academico/syllabus/obtenermatriculasxcarrera'
				,actionMethods: {read: 'POST'}
				,reader: {type: 'json',rootProperty: 'matriculas'}
			}
			,groupField: 'norden'
		});

		var gridmatriculas=Ext.create('Ext.grid.Panel',{
			title:'Syllabus'
			,store: stmatricula
			,region: 'center'
			,forceFit:true
			,features: [{
				ftype: 'grouping'
				,groupHeaderTpl: '{name}'
				,hideGroupedHeader: true
				,enableGroupingMenu: false
				,startCollapsed: true
			}]
			,selModel: {
			   type: 'spreadsheet'
			}
			,tbar:{
				items:[
					{
						xtype:'combo'
						,id:'cbocarrera'
						,fieldLabel:'Carreras'
						,allowBlank:false
						,store:stcarrera
						,queryMode:'local'
						,displayField:'carrera'
						,valueField:'rcodigo'
						,forceSelection:true
						,width:450
						,listeners:{
							select:function(combo,record,eOpts){
								stmatricula.load({params:{rcodigo:combo.getValue()}});
							}
						}
					}
					,'->'
					,{
						xtype:'button'
						,text:'Contraer'
						,handler:function(){
							gridmatriculas.getView().features[0].collapseAll();
						}
					}
					,{
						xtype:'button'
						,text:'Expandir'
						,handler:function(){
							gridmatriculas.getView().features[0].expandAll();
						}
					}
				]
			}
			,plugins: ['gridfilters']
			,columns: [
				{dataIndex: 'syllabus',header: 'SYLL',width: 40,fixed:true
					,renderer:function(value,metaData,record){
						var img='printer.png';
						var mensaje='IMPRIMIR';
						var ref="javascript:var parametros=[];parametros.push({nombre:'codigo',valor:"+record.data.syllabus+"});"
									+"reporte('/siutmach/public/academico/reportes/index','SYLLABUS',parametros);";
						if(record.data.tsyllabus >= 1)
							ref="javascript:var parametros=[];parametros.push({nombre:'dcodigo',valor:"+record.data.dcodigo+"});parametros.push({nombre:'tipo',valor:"+record.data.tsyllabus+"});"
									+"reporte('/siutmach/public/academico/reportes/imprimirsyllabus','SYLLABUS',parametros);";
						if(value==0){
							img='clear.png';
							mensaje='NO INGRESADO';
						}
						if(record.data.sestado=='I'){
							img='actual.png';
							mensaje='EN PROCESO';
						}
						metaData.tdAttr = 'data-qtip="' + mensaje + '"';
						if(mensaje=='IMPRIMIR')
							return '<a onclick="'+ref+'" href="#"><img src="/siutmach/public/imagenes/kerberos/'+img+'"></a>';
						return '<img src="/siutmach/public/imagenes/kerberos/'+img+'">';
					}
				}
				,{dataIndex: 'norden',header: 'NIVEL',width: 90}
				,{dataIndex: 'numeracion',header: 'ASIG.NÚM.',width: 90}
				,{dataIndex: 'asignatura',header: 'ASIGNATURA',width: 230}
				,{dataIndex: 'credito',header: 'CRED.',width: 60}
				,{dataIndex: 'horas',header: 'HORAS',width: 60}
				,{dataIndex: 'curso',header: 'CURSO/PARALELO',width: 120}
				,{dataIndex: 'seccion',header: 'SECCIÓN',width: 110}
				,{dataIndex: 'docente',header: 'DOCENTE',width: 290}
				,{dataIndex: 'estado',header: 'ESTADO',width: 80}
			]
		});

		Ext.create('Ext.container.Viewport',{
			layout:'border'
			,items:[
				gridmatriculas
			]
		});
		
		stcarrera.load({
			callback:function(records, operation, success){
				if(records.length>0){
					Ext.getCmp('cbocarrera').setValue(records[0].data.rcodigo);
					stmatricula.load({params:{rcodigo:records[0].data.rcodigo}});
				}
			}
		});
	});


    javascript:var parametros=[];parametros.push({nombre:'dcodigo',valor:46402});parametros.push({nombre:'tipo',valor:3});reporte('/siutmach/public/academico/reportes/imprimirsyllabus','SYLLABUS',parametros);