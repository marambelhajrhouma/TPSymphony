package com.spiral.technologies.service;

import org.camunda.bpm.engine.ProcessEngine;
import org.springframework.stereotype.Service; // Add this import

@Service 
public class RecService {
    private ProcessEngine processEngine;

    public RecService(ProcessEngine processEngine) {
        this.processEngine = processEngine;
    }

    public void demarerRecrutement() {
        processEngine.getRuntimeService().startProcessInstanceByMessage("nouvelleRecrutement", "rec-1");
    }
}