package com.spiral.technologies;

import org.camunda.bpm.engine.ProcessEngine;

public class RecrutementService {
	private ProcessEngine processEngine;

	
	public RecrutementService(ProcessEngine processEngine) {
		this.processEngine = processEngine;
	}


	public void demarerRecrutement() {
		processEngine.getRuntimeService().startProcessInstanceByMessage("nouvelleRecrutement", "rec-1");
		
	}

}
